<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
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

require __DIR__.'/auth.php';
