<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use App\Http\Requests\StoreEpisodesRequest;
use App\Http\Requests\UpdateEpisodesRequest;
use App\Models\Seasons;
use App\Models\Series;
use Illuminate\Database\Eloquent\Model;
use ZipArchive;
use Illuminate\Support\Str;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('add.episode');
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
    public function store(StoreEpisodesRequest $request)
    {


        $this->validate($request,[
            'name' => 'required',
            'title' => 'required',
            'episode'=>'required',
            'movie'=>'mimes:mp4,x-flv,x-pegURL,qt|required|max:102400'
        ]);


        $episode = new Episodes();


        $series_name = Str::lower($request->input('name'));
        $season_name = Str::lower($request->input('title'));
        $episode_name=$request->input('episode');


        $series = Series::where('series_name',$series_name)->get();

        if ($series->count()>0){

            foreach ($series as $serie){
                $serie = $serie;
            }

            $season = Seasons::where('season_name',$season_name)->where('series_id',$serie->id)->get();

            if ($season->count()>0){

                foreach ($season as $sea){
                    $sea = $sea;
                }

                $episode->series_id = $serie->id;
                $episode->seasons_id = $sea->id;
                $episode->episode_name = $episode_name;

            }else{
                return redirect('/episodes')->with('error',$season_name.' is not a valid season number');
            }



        }else{
            return redirect('/episodes')->with('error',$series_name.' is not a valid series name');
        }



        if ($request->hasFile('movie')){

            //filename with extension
            $filenameWithExt = $request->file('movie')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('movie')->getClientOriginalExtension();

            //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            //get image path
            $path = $request->file('movie')->storeAs('public/movies',$filenameToStore);

            //get file size
            $size = $request->file('movie')->getSize();



        }else{
            return redirect('/episodes')->with('error','movie field can not be empty');
        }





        if ($request->hasFile('movie')) {
            $episode->movie = $filenameToStore;
        }

        $episode->file_size = $this->bytesToHuman($size);
        $episode->save();

        return redirect('/episodes')->with('success','new episode added');



    }

    /**
     * Display the specified resource.
     */
    public function show(Episodes $episodes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Episodes $episodes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEpisodesRequest $request, Episodes $episodes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episodes $episodes)
    {
        //
    }



    public function bytesToHuman($bytes){
        $units = ['B','KiB','MiB','GiB','TiB','PiB'];

        for($i=0; $bytes > 1024; $i++){
            $bytes /=1024;
        }

        return round($bytes,2).' '.$units[$i];
    }


    public function getDownload($file_name){
        $file_path = public_path('movies/'.$file_name);
        return response()->download($file_path);
    }


    public function getZipDownload($file_name){


        $public_dir=public_path();
        $zipFileName = $file_name.'.zip';
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive
            $invoice_file = 'movies/maxvisuals.txt';
            $movie_file = 'movies/'.$file_name;
            $zip->addFile($invoice_file,$invoice_file);
            $zip->addFile($movie_file,$movie_file);
            $zip->close();
        }

        $filetopath=$public_dir.'/'.$zipFileName;
        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName);
        }

    }


    public function getZip1Download($file_name){
        $public_dir=public_path();
        $zipFileName = $file_name.'.zip';
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive
            $invoice_file = 'movies/thanks.txt';
            $movie_file = 'movies/'.$file_name;
            $zip->addFile($public_dir . '/'.$invoice_file,$invoice_file);
            $zip->addFile($public_dir . '/'.$movie_file,$movie_file);
            $zip->close();
        }

        $filetopath=$public_dir.'/'.$zipFileName;
        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName);
        }

    }




}
