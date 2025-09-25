<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthOr404;
use App\Http\Middleware\PreventBack;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('guest')
    ->controller(AuthController::class)->group(function () {
        Route::get('/', 'loginForm')->name('login.page');
        Route::post('/login', 'login')->name('login.form');
        Route::get('/register', 'registerForm')->name('register.page');
        Route::post('/register', 'register')->name('register.form');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.page');

Route::middleware([AuthOr404::class, PreventBack::class])
    ->controller(PostController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('post.index');
        Route::get('/posts/create', 'create')->name('post.create');
        Route::get('/posts/{post}', 'show')->name('post.show');
        Route::post('/posts/{post}/comment', 'addComment')->name('post.comment');
        Route::post('/posts', 'store')->name('post.store');
})->middleware('auth');