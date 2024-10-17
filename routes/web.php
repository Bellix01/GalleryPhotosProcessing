<?php

use App\Http\Controllers\AlbumController;
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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/albums', AlbumController::class)->middleware('auth');
Route::post('albums/{album}/upload', [AlbumController::class, 'upload'])->name('albums.upload')->middleware('auth');
Route::get('/albums/{album}/image/{image}', [AlbumController::class, 'showImage'])->name('album.image.show');
Route::delete('/albums/{album}/image/{image}', [AlbumController::class, 'destroyImage'])->name('album.image.destroy');
Route::get('/albums/{album}/image', [AlbumController::class, 'show'])->name('album.show');

// Crop :
Route::get('albums/{album}/image/{image}/imagetoCrop', [App\Http\Controllers\CropImageUploadController::class, 'showToCropImage'])->name('album.image.crop');
Route::post('albums/{album}/image/{image}/crop', [App\Http\Controllers\CropImageUploadController::class, 'cropImage'])->name('album.image.cropImage')->middleware('auth');


Route::get('download/albums/{album}/image/{image}', [App\Http\Controllers\imgDownloadController::class, 'download'])->name('album.image.download');
// Retrieve feddback of an existed image:
Route::get('albums/{album}/image/{image}/img', [AlbumController::class, 'showQuery'])->name('album.image.showQueryImg');

// Retrieve feddback of an input image route:
Route::get('albums/{album}', [AlbumController::class, 'showToQuery'])->name('album.image.showQuery');
Route::get('albums/{album}/id', [AlbumController::class, 'retrieveImages'])->name('album.retrieve');


