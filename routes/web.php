<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\InfographicsController;
use App\Http\Controllers\AnnouncementsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'auth.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/posts', PostsController::class, ['names' => 'post']);
Route::resource('/infographics', InfographicsController::class, ['names' => 'infographic']);
Route::resource('/announcements', InfographicsController::class, ['names' => 'announcement']);
