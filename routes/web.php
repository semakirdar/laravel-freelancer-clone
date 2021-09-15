<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/detail/{id}', [JobController::class, 'show'])->name('detail');
Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job/store', [JobController::class, 'store'])->name('job.store');

Route::get('/bid/index', [BidController::class, 'index'])->name('job.bid.index');
Route::get('/bid/create/{id}', [BidController::class, 'create'])->name('job.bid.create');
Route::post('/bid/store', [BidController::class, 'store'])->name('job.bid.store');
Route::get('/bid/edit/{id}', [BidController::class, 'edit'])->name('job.bid.edit');
Route::post('/bid/update/{id}', [BidController::class, 'update'])->name('job.bid.update');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile');
Route::post('/store/{id}', [ProfileController::class, 'store'])->name('profile.store');


