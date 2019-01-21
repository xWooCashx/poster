<?php

use App\Http\Controllers\PostController;

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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/top', 'PostController@indexTop')->name('posts.top');
Route::get('/posts/user/{id}', 'PostController@indexUser')->middleware('auth');
Route::resource('posts','PostController')->middleware('auth')->except('index');
Route::post('/comments', 'CommentController@store')->name('comments.store')->middleware('auth');
Route::post('/posts/{post_id}/{user_id}', 'UpvoteController@upvote')->middleware('auth');

