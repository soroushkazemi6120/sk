<?php

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


Route::prefix('user')->namespace('admin')->group(function () {

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');

});

//Route::middleware('auth:api')->group(function () {
//    Route::get('/user2', function () {
//        return auth()->user();
//    });

    Route::prefix('/admin')->namespace('admin')->group(function () {
        Route::get('/panel', 'PanelController@index')->middleware('checkAdmin');
        Route::resource('articles', 'ArticleController');
        Route::post('article/store', 'ArticleController@store');
        Route::patch('articles/{id}/update', 'ArticleController@update2');


        //  Route::post('article/delete','ArticleController@delete');


        Route::resource('roles', 'RoleController');
        Route::post('role/store', 'RoleController@store');
        Route::post('role/update', 'RoleController@update');
        Route::post('role/delete', 'RoleController@delete');


        Route::resource('permissions', 'PermissionController');
        Route::post('permission/store', 'PermissionController@store');
        Route::post('permission/update', 'updatecontroller@update');
        Route::post('permission/delete', 'PermissionController@delete');

//        Route::prefix('a')->group(function () {
////
//    Route::post('login', 'UserController@login');
//   Route::post('register', 'UserController@register');
//
//});


        Route::group(['prefix' => 'users'], function () {

            Route::get('/', 'UserController@index');

            Route::resource('level', 'LevelManageController', ['parameters' => ['level' => 'user']]);
            Route::post('level/store', 'LevelManageController@store');
            Route::post('level/update', 'LevelManageController@update');
            Route::post('level/delete', 'LevelManageController@delete');

            Route::delete('/{user}/destroy', 'UserController@destroy')->name('users.destroy');
        });





});

