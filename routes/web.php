<?php

use Illuminate\Support\Facades\Route;
use App\Models\Series;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $series = Series::orderBy('updated_at','desc')->paginate(20);

    $data = array('series'=>$series);
//    dd($data);

    return view('pages.series')->with($data);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    'series' => SeriesController::class,
    'seasons' => SeasonsController::class,
    'episodes' => EpisodesController::class,
    'posts' => PostController::class,
    ]);

Route::get('/series-search',[SeriesController::class,'getSeries']);

Route::get('download/{file}', [EpisodesController::class, 'getZipDownload']);
