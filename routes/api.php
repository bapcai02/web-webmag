<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user',function(Request $request){
     return $request->user();
});

route::post('login','api\HomeApi@login');
Route::post('register', 'api\HomeApi@register');

Route::group(['prefix' => 'auth'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/category','api\HomeApi@category');
        Route::get('/category/{id}','api\HomeApi@categoryFindId');
        Route::post('/category/add','api\HomeApi@categorySave');
        Route::put('/category/update/{id}','api\HomeApi@categoryUpdate');
        Route::delete('/category/delete/{id}','api\HomeApi@categoryDelete');
    });
});
Route::group(['prefix' => 'category'], function () {
    Route::get('/','api\Category@index');
            Route::get('/{id}','api\Category@show');
            Route::post('/add','api\Category@store');
            Route::put('/update/{id}','api\Category@update');
            Route::delete('/delete/{id}','api\Category@destroy');

    });
