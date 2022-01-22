<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

//Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect()->route('home');
});

//Auth related routes
Auth::routes();

//Routes related do Contacts management
Route::resource('contacts', ContactController::class)->except(['index'])->middleware('auth');

//Routes related do Users management
Route::resource('users', UserController::class)->middleware('auth');

//Routes related do Users management
Route::resource('profiles', ProfileController::class)->middleware('auth');