<?php

use App\Http\Controllers\ExcplorController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FollwingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserRelationshipController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\If_;
//home route
Route::get('/', [TweetController::class, 'index'])->name('home');
//register and 
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//login routes
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', LogoutController::class)->name('logout');

//tweets routes and shs the view of a single tweet
Route::get('/tweet/{tweet}', [TweetController::class, 'view'])->name('tweet.view');
Route::post('/tweet/create', [TweetController::class, 'store'])->name('tweet.create');
Route::get('/explore', [ExcplorController::class, 'create'])->name('explore');
//follwimg and unfollowing routes
Route::get('users/{userId}/followers', [UserRelationshipController::class, 'followers'] ) ->name('user.followers');
Route::get('users/{userId}/followees', [UserRelationshipController::class, 'followees']) ->name('user.followees');
