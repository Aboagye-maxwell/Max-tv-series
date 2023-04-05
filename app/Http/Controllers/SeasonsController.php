<?php

namespace App\Http\Controllers;

use App\Models\Seasons;
use App\Http\Requests\StoreSeasonsRequest;
use App\Http\Requests\UpdateSeasonsRequest;
use App\Models\Series;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('add.season');
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
    public function store(StoreSeasonsRequest $request)
    {


        $this->validate($request,[
            'name' => 'required',
            'number' => 'required'
        ]);


        //instantiate new season class
        $season = new Seasons();



        //take inputs
        $series_nam = $request->input('name');
        $number =  $request->input('number');

        //remove empty spaces from string
        $nam=trim($number);

        //change case to lower
        $series_name=Str::lower($series_nam);
        $name=Str::lower($nam);



        $series = Series::where('series_name',$series_name)->get();


        if ($series->count()>0){

            foreach ($series as $serie){
                $serie = $serie;
            }
            $season->series_id =$serie->id;

            //save season name to database
            $season->season_name =$name;

            $season->save();

            return redirect('/seasons')->with('success','Season '.$nam.' Added');
        }else{
            return redirect('/seasons')->with('error',$series_nam.' does not exits');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Seasons $seasons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seasons $seasons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeasonsRequest $request, Seasons $seasons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seasons $seasons)
    {
        //
    }
}
