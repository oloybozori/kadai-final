<?php

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

Route::get('/', 'PostsController@index');

// User registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// Post
Route::resource('posts', 'PostsController');
// Region
Route::resource('regions', 'RegionsController', ['only' => ['show']]);
// Category
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

Route::group(['middleware' => ['auth']], function () {
   Route::resource('users', 'UsersController', ['only' => ['show']]); 
   Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'destroy']]);
   Route::resource('comments', 'CommentsController', ['only' => ['store']]); 
   Route::group(['prefix' => 'post{id}'], function () {
      Route::post('like', 'LikesController@store')->name('likes.like');
      Route::delete('unlike', 'LikesController@destroy')->name('likes.unlike');
   });
   Route::get('my_posts/{id}', 'PostsController@my_posts')->name('my_posts');
   Route::get('my_likes/{id}', 'PostsController@my_likes')->name('my_likes');   
});

