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


Route::get('/index','HomeController@index')->name('index');
Route::get('/details/{id}','DetailsController@getdetails')->name('details');
Route::get('/category/{id}','CategoryController@getcategory')->name('category');
Route::get('/items/{id}','ItemsCategoryController@getitems')->name('items');
Route::get('/about','AboutController@about')->name('about');
Route::get('/contact','ContactController@contact')->name('contact');



Route::get('/admin','AdminController@index')->name('admin');
Route::get('all-post','PostController@all_post')->name('all_post');
Route::get('add-post','PostController@add_post')->name('add_post');
Route::post('save-post','PostController@save_post')->name('save_post');
Route::get('edit-post/{id}','PostController@edit_post')->name('edit_post');
Route::post('update-post/{id}','PostController@update_post')->name('update_post');
Route::get('delete-post/{id}','PostController@detete_post')->name('delete_post');


