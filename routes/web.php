<?php

use App\Models\User;
use App\Models\posts;
use App\Livewire\Logout;
use App\Models\Category;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MyblogController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(["login" => false, "register" => false, 'verify' => true]);
Route::middleware('guest')->group(function () {
    Route::get('/', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
// routes/web.php
Route::post('/myprofile/logout', [Logout::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/myblog/{id}', [MyblogController::class, 'index'])->name('myblog');
Route::get('/addposts', [PostsController::class, 'create'])->name('create');
Route::post('/post', [PostsController::class, 'store'])->name('addpost');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('tampil');
Route::get('/myprofile/{id}', function ($id) {
    return view('myprofile', ['judul' => 'my profile', 'user' => User::find($id)]);
});
Route::get('/home/{user:id}', [PostsController::class, 'where'])->name('where_author');
// routes/web.php
Route::get('/home/category/{category:id}', [PostsController::class, 'category']);
Route::get('/post_edit/{posts:id}', [PostsController::class, 'edit']);
Route::put('/editpost/{posts:id}', [PostsController::class, 'update'])->name('editpost');
Route::delete('/post_hapus/{posts:id}', [PostsController::class, 'destroy'])->name('hapus');
