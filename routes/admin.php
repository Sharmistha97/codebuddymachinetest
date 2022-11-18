<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth;
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
//NOTE
//if it is admin url like http://127.0.0.1:8000/admin/login then only admin see admin dashboad
// if it is user url login http://127.0.0.1:8000/user/login then admin and user can see user dashboad
//fpr admin logout this->http://127.0.0.1:8000/admin/logout user->http://127.0.0.1:8000/user/logout
//use migration and db seeder for user admin category and level

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Auth\LoginController@login'); 
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::any('home', 'HomeController@index')->name('admin.home');
    Route::any('create', 'HomeController@create')->name('admin.cat.create');
    Route::any('store', 'HomeController@store')->name('admin.cat.store');
    Route::any('edit/{id}', 'HomeController@edit')->name('admin.cat.edit');
    Route::any('update/{id}', 'HomeController@update')->name('admin.cat.update');
    Route::any('delete/{id}', 'HomeController@delete')->name('admin.cat.delete');
});
Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('login', 'Auth\LoginController@login'); 
});
Route::group(['namespace' => 'User', 'prefix' => 'user','middleware' =>'user'], function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');
    Route::any('home', 'HomeController@index')->name('user.home');
});