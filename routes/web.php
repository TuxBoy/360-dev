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

Route::get('/', 'HomeController@index')->name('home.index');

Route::resource('blog', 'PostsController');
Route::get('blog/categorie/{slug}', 'PostsController@category')->name('blog.category');

// Admin Dashboard
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('posts',      'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('users',      'UserController');
});

Auth::routes();
