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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','pageController@index');
Route::get('createTodo','pageController@get_createTodo');
Route::post('addTodo','pageController@post_addTodo');
Route::get('edittodo/{id}','pageController@get_editTodo');
Route::post('updateTodo/{id}','pageController@post_editTodo');
Route::get('deleteTodo/{id}','pageController@get_deleteTodo');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
