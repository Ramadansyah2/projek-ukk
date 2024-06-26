<?php

use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\AlbumsAllController;
use App\Http\Controllers\PhotosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikedPhotoController;


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
    return view('auth.login');
})->middleware('guest');


// Path: routes\web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/myalbums', [AlbumsController::class, 'index']);
    Route::get('/myalbums/create', [AlbumsController::class, 'create'])->name('albums.create');
    Route::get('/myalbums/{album}', [AlbumsController::class, 'show'])->name('albums.show');
    Route::post('/myalbums', [AlbumsController::class, 'store'])->name('albums.store');
    Route::delete('/myalbums/{id}', [AlbumsController::class, 'destroy'])->name('albums.destroy');

    Route::get('/albums', [AlbumsAllController::class, 'index']);

    Route::get('/photo/upload/{album_id}', [PhotosController::class, 'create'])->name('photos.create');
    Route::post('/photo/upload', [PhotosController::class, 'store'])->name('photos.store');
    Route::get('/photo/{photo}', [PhotosController::class, 'show'])->name('photos.show');
    Route::delete('/photo/{id}', [PhotosController::class, 'destroy'])->name('photos.destroy');

    Route::post('/albums/{photo}/toggle-like', [LikeController::class, 'toggle'])->name('likes.toggle');
    Route::get('/albums/{photo}/check-like', [LikeController::class, 'checkLike'])->name('likes.check');

    Route::post('/photos/{photo}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/liked-photo', [LikedPhotoController::class, 'index']);
});

// Rute login dan logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
