<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\public\HomeController;
use App\Http\Controllers\public\PostsController;

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

Route::get('/', HomeController::class)->name('home');
Route::get('/home', HomeController::class)->name('home');
Route::get('/about', function () {
    return view('/public/about');
})->name('about');
Route::get('/contact', function () {
    return view('/public/contact');
})->name('contact');
Route::get('/events', function () {
    return view('/public/events');
})->name('events');
Route::get('/category/{slug}', function () {
    return view('/public/category');
})->name('category');
Route::get('/posts', PostsController::class )->name('posts');
Route::get('/post/{slug}', [PostsController::class, "post"])->name('post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
