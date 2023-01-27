<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artist',[ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}',[ArtistController::class, 'show'])->where('id','[0-9]+')->name('artist.show');
Route::get('/artist/edit/{id}',[ArtistController::class, 'edit'])->where('id','[0-9]+')->name('artist.edit');
Route::put('/artist/{id}',[ArtistController::class, 'update'])->where('id','[0-9]+')->name('artist.update');
