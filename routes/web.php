<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('post.index');
    Route::get('/posts/create', 'create')->name('post.create');
    Route::get('/posts/{post}', 'show')->name('post.show');
    Route::post('/posts/{post}/comment', 'addComment')->name('post.comment');
    Route::post('/posts', 'store')->name('post.store');
});