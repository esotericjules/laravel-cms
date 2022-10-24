<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories', 'App\Http\Controllers\CategoriesController');
    Route::resource('post', 'App\Http\Controllers\PostController')->middleware('auth');
    Route::resource('tags', 'App\Http\Controllers\TagsController');
    Route::get('trashed-posts', 'App\Http\Controllers\PostController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'App\Http\Controllers\PostController@restore')->name('restore-posts');
});