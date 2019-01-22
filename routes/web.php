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
Route::get('/searchbar', 'HomeController@search')->name('home.search')->middleware('auth');
Route::get('/search', 'HomeController@searchFor')->name('search.action')->middleware('auth');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/top', 'PostController@indexTop')->name('posts.top');
Route::get('/posts/user/{id}', 'PostController@indexUser')->middleware('auth');
Route::resource('posts','PostController')->middleware('auth')->except('index');
Route::post('/comments', 'CommentController@store')->name('comments.store')->middleware('auth');
Route::get('/comments/{comment_id}/edit', 'CommentController@edit')->name('comments.edit')->middleware('auth');
Route::put('/comments/{comment_id}', 'CommentController@update')->name('comments.update')->middleware('auth');
Route::delete('/comments/{comment_id}', 'CommentController@destroy')->name('comments.destroy')->middleware('auth');
Route::post('/posts/{post_id}/{user_id}', 'UpvoteController@upvote')->middleware('auth');

