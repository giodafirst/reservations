<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\RepresentationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/type',[TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}',[TypeController::class, 'show'])->name('type.show');
Route::get('/artist',[ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}',[ArtistController::class, 'show'])->where('id','[0-9]+')->name('artist.show');
Route::get('/artist/edit/{id}',[ArtistController::class, 'edit'])->where('id','[0-9]+')->name('artist.edit');
Route::put('/artist/{id}',[ArtistController::class, 'update'])->where('id','[0-9]+')->name('artist.update');
Route::delete('/artist/{id}',[ArtistController::class, 'destroy'])->where('id','[0-9]+')->name('artist.delete');
Route::get('/artist/create',[ArtistController::class, 'create'])->name('artist.create');
Route::post('/artist',[ArtistController::class, 'store'])->name('artist.store');
Route::get('/locality',[LocalityController::class, 'index'])->name('locality.index');
Route::get('/locality/{id}',[LocalityController::class, 'show'])->where('id','[0-9]+')->name('locality.show');
Route::get('/role',[RoleController::class, 'index'])->name('role.index');
Route::get('/role/{id}',[RoleController::class, 'show'])->name('role.show');
Route::get('/location',[LocationController::class, 'index'])->name('location.index');
Route::get('/location/{id}',[LocationController::class, 'show'])->where('id','[0-9]+')->name('location.show');
Route::get('/show',[ShowController::class, 'index'])->name('show.index');
Route::get('/show/{id}',[ShowController::class, 'show'])->where('id','[0-9]+')->name('show.show');
Route::get('/representation',[RepresentationController::class, 'index'])->name('representation.index');
Route::get('/representation/{id}',[RepresentationController::class, 'show'])->where('id','[0-9]+')->name('representation.show');
Route::get('/representation', [RepresentationController::class, 'search'])->where('id','[0-9]+')->name('representation.search');



require __DIR__.'/auth.php';
