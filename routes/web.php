<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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
Route::controller(PageController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get("blog", 'blog')->name('blog');
    Route::get("blog/{post:slug}", 'post')->name('post');

});

// Route::controller(PostController::class)->group(function(){

// Route::get('/dashboard','index')->middleware(['auth', 'verified'])->name('dashboard');

// });


Route::redirect('/dashboard','posts')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Utiliza el metodo resource para utilizar todas las funciones de ruta en una sola linea (index, create, store, show, edit, update y destroy) 
// por medio del recurso nombrado posts el cual utiliza las consultas o peticiones del controlador Post excepto la ruta show
Route::resource('posts',PostController::class)->except('show');

require __DIR__.'/auth.php';
