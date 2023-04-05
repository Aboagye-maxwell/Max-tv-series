<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show'] ]);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {


        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'cover_image'=> 'image|nullable|max:1999',
        ]);

        //handle the file upload
        if ($request->hasFile('cover_image')){
            //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/upload_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpeg';
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','post created successfully');



    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'cover_image'=> 'image|nullable|max:1999',
        ]);

        //handle the file upload
        if ($request->hasFile('cover_image')){
            //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/upload_images',$fileNameToStore);

        }


        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')){
            //delete previous image
            Storage::delete('public/upload_images/'.$post->cover_image);
            //store new image in directory
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect("/posts/$post->id")->with('success','post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        if ($post->cover_image != 'noimage.jpeg'){
            Storage::delete('public/upload_images/'.$post->cover_image);
        }

        $post->delete();

        return redirect("/posts")->with('success','post deleted successfully');

    }
}
