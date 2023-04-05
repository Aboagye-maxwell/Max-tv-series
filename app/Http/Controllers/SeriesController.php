<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('add.series');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeriesRequest $request)
    {
        $this->validate($request,[
            'series_name' => 'required|unique:series',
            'body' => 'required',
            'cover_image'=>'image|required|max:8096'
        ]);


        $series = new Series();


        if ($request->hasFile('cover_image')){

            //filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;


            //get image path
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);


            //resize and store image
            Image::make("image-c/{$filenameToStore}")->fit(1920,1080)->save();


        }else{
            return redirect('/series')->with('error','image field can not be empty');
        }



        $series->series_name = Str::lower($request->input('series_name'));


        $series->series_description=$request->input('body');

        $des = $request->input('body');
        $truncated =Str::limit($des,300,'...');
        $series->series_description_truancated=$truncated;

        $recent= $request->input('recent');

        if ($recent=="1"){
            $series->recent="true";
        }else{
            $series->recent="false";
        }

        $genres = $request->input('genres');
        $series->genres=$genres;

        $language = $request->input('language');
        $series->language=$language;

        $resolution = $request->input('resolution');
        $series->resolution=$resolution;

        $size = $request->input('size');
        $series->estimated_episode_size=$size;

        $rating = $request->input('rating');
        $series->imdb_rating=$rating;
        if ($request->hasFile('cover_image')) {
            $series->cover_image = $filenameToStore;

            //get image path
            $p =$request->file('cover_image')->storeAs('public/cover_images_sized',$filenameToStore);
            //store image
            $p;

            $series->cover_image_sized = $filenameToStore;

            //resize and store image
            Image::make("image-s/{$filenameToStore}")->fit(1080,1300)->save();

        }
        $series->users_loved = "true";
        $series->save();

        return redirect('/series')->with('success','new series added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        $seasons = $series->seasons->sortByDesc('updated_at');
        $episodes = $series->episodes->sortByDesc('updated_at');
        $episodes_l = $series->episodes->sortByDesc('updated_at')->first();
        $seasons_l = $series->seasons->sortByDesc('updated_at')->first();
//        dd($episodes);
        $users_loved = Series::all()->sortByDesc('updated_at')->random(12);
        $once =Series::all()->random(1)->first();



        $data = array(
            'series' => $series,
            'seasons' => $seasons,
            'episodes'=>$episodes,
            'users_loved'=>$users_loved,
            'once'=>$once,
            'episodes_l'=>$episodes_l,
            'seasons_l'=>$seasons_l,
        );

        return view('pages.more')->with($data);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeriesRequest $request, Series $series)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        //
    }


//Used to search for a particular series name from database
    public function getSeries(Request $request){
        $data = Series::where('series_name','LIKE','%'.$request->search.'%')->get();
        return response()->json($data);
    }


}
