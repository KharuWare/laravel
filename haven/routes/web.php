<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
// 58:18
Route::get('/', function () {
    $posts = Post::latest()->get();
    // $posts = [];
    // if (auth()->check()) {
    //     $posts = auth()->user()->postCount()->latest()->get();
    // }
    return view('register', ['posts' => $posts]);
});

// Login and register routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Navigation routes
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile-edit', function () {
    return view('profile-edit');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/users/{id}', [UserController::class, 'getUser']);

Route::get('/404', function () {
    return view('404');
});

Route::get('/posts', function () {
    $posts = Post::latest()->get();
    return view('posts', ['posts' => $posts]);
});

// Post routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/post/{post}', [PostController::class, 'getPost']);
Route::get('/post-edit/{post}', [PostController::class, 'editPost']);
Route::put('/post-edit/{post}', [PostController::class, 'postUpdate']);
Route::delete('/post-edit/{post}', [PostController::class, 'deletePost']);

// User routes

