<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]); 

Route::get('/home', [PostController::class, 'index'])->name('posts');

Route::resource('posts', PostController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');

//This action, by using auth middleware, it only allows logged in user to access specific pages/function
Route::get('/users/{user}/posts', [PostController::class, 'userPosts'])->name('users.posts.index');

//    (create, store, edit, update, destroy). Index and show remain public.
// Route::resource('posts', PostController::class)->except(['index', 'show'])->middleware('auth');

// Route::resource('posts', PostController::class)->only(['index', 'show'])->middleware('auth'); 

Route::resource('posts', PostController::class)->only(['index', 'show']);



