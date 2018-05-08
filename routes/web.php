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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dishes', 'DishController@index')->name('all.dishes');
Route::get('/dishes/{id}', 'DishController@show')->name('one.dish');

Route::group(['middleware'=> ['auth'], 'prefix'=>'admin'],function (){
  Route::get('/', 'AdminController@index');
  Route::get('/dishes', 'DishController@admin')->name('admin.dishes');
  Route::get('/dishes/{id}', 'DishController@adminshow')->name('one.dish');
  Route::get('/adddish', 'DishController@create')->name('add.dish');
  Route::get('/dishes/{dish}/edit', 'DishController@edit')->name('dish.edit');
  Route::put('/dishes/{dish}/update', 'DishController@update')->name('dish.update');
  Route::post('/dishes', 'DishController@store')->name('dish.store');
  Route::delete('/dishes/{dish}', 'DishController@destroy')->name('dish.delete');

  Route::get('/mains', 'MainController@index')->name('admin.mains');
  Route::get('/mains/create', 'MainController@create')->name('create.main');
  Route::delete('/mains/{main}', 'MainController@destroy')->name('main.delete');
  Route::post('/mains', 'MainController@store')->name('main.store');
  Route::get('/mains/{main}/edit', 'MainController@edit')->name('main.edit');
  Route::put('/mains/{main}/update', 'MainController@update')->name('main.update');

});

Route::get('countries', 'HomeController@countries');
