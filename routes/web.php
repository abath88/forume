<?php

use App\Http\Controllers\CommentCommentController;
use App\Http\Controllers\CommentVoteController;
use App\Http\Controllers\PostCommentCotroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PostVoteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index'])->name('dashboard');
Route::get('/post/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/post/store', [PostController::class, 'store'])->middleware('auth');
Route::post('/post/{post}/comment/store', [PostCommentCotroller::class, 'store'])->middleware('auth');
Route::post('/comment/{comment}/store', [CommentCommentController::class, 'store'])->middleware('auth');


Route::get('/post/{post}', [PostController::class, 'show']);

Route::post('/post/{post}/upvote', [PostVoteController::class, 'upvote'])->middleware('auth');
Route::post('/post/{post}/downvote', [PostVoteController::class, 'downvote'])->middleware('auth');

Route::post('/comment/{comment}/upvote', [CommentVoteController::class, 'upvote'])->middleware('auth');
Route::post('/comment/{comment}/downvote', [CommentVoteController::class, 'downvote'])->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
