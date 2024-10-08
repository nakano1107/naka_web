<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ChatController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

# 投稿機能
Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/search', 'search')->name('search');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}/delete', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

# ユーザープロフィール
Route::get('/users/{user}', [UserController::class, 'userProfile']);

# タグ機能
Route::get('/tags/{tag}', [TagController::class, 'tagList']);

# フォロー機能
Route::get('/users/{user}/follow', [FollowController::class, 'follow']);
Route::delete('/users/{user}/unfollow', [FollowController::class, 'unfollow']);

# DM機能
Route::get('/chat', [ChatController::class, 'chatList'])->name('chat');
Route::post('/chat', [ChatController::class, 'sendMessage']);
Route::get('/chat/{user}', [ChatController::class, 'openChat']);
