<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Promise\Create;
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

Route::get('/', [TweetController::class, 'index'])->name('home');

// User Login Page
Route::get('/login', [UserController::class, 'login'])->name('login');

// User Registration Page
Route::get('/register', [UserController::class, 'create']);

// Registration Process
Route::post('/users/store', [UserController::class, 'store']);

// Login Process
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Logout Process
Route::post('/logout', [UserController::class, 'logout']);

// ---------------------------------------------------------------------- //

// Tweet Store
Route::middleware('auth')->post('tweets/store', [TweetController::class, 'store']);

// Tweet Delete
Route::middleware('auth')->delete('tweets/delete/{id}', [TweetController::class, 'destroy']);

// Explore Page
Route::middleware('auth')->get('/explore', [TweetController::class, 'explore'])->name('explore');

// Following Page
Route::middleware('auth')->get('/followings', [TweetController::class, 'followings'])->name('followings');

Route::middleware('auth')->get('/followers', [TweetController::class, 'followers'])->name('followers');

Route::middleware('auth')->get('/notifications', [NotificationController::class, 'index'])->name('notifications');






// ---------------------------------------------------------------------------------//

Route::delete('comments/delete/{id}', [CommentController::class,'destroy'])->name('comments.delete');
Route::post('comments/store/{id}', [CommentController::class,'store'])->name('comments.store');


Route::post('follows/{id}',[FollowerController::class,'store'])->name('follow');
Route::post('unfollows/{id}',[FollowerController::class,'destroy'])->name('unfollow');

Route::post('likes/{id}',[LikeController::class,'store'])->name('likes');;

