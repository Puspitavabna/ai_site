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

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home.index'
]);

Route::get('/admin', function () {
    return view('admin.admin_login');
});

Route::post('/admin_login', [
    'uses' => 'AdminController@login',
    'as' => 'admin.post_login'
]);