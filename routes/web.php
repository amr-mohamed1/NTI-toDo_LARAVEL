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

Route::get('signup','userController@signup');
Route::post('doSignup','userController@doSignup');
Route::get('login','userController@login');
Route::post('doLogin','userController@doLogin');
Route::get('tasks','userController@tasks');
Route::get('delete/{id}','userController@delete');
Route::get('create','userController@create');
Route::post('addTask','userController@addTask');

Route::view("user_Login","login");
Route::view("dash","dash");
