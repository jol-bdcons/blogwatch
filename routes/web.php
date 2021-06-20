<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', 'PostsController@index')->name('home');
Route::get('/dashboard', 'UserPostsController@index')->name('dashboard')->middleware(['auth:sanctum', 'verified']);
Route::get('/add-post', 'UserPostsController@create')->name('add-post')->middleware(['auth:sanctum', 'verified']);
Route::post('/add-post', 'UserPostsController@store')->middleware(['auth:sanctum', 'verified']);
