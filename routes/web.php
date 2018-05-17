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

Route::get('/', 'HomeController@index')->name('welcome');

// Route::get('/contacts', function(){
//     return View('contacts')
// })->name('contacts');


// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/dishes', 'DishController@index')->name('all.dishes');
Route::get('/dishes/{id}', 'DishController@show')->name('one.dish');

Route::group(['middleware'=> ['admin'], 'prefix'=>'admin'],function (){
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

  Route::get('/reservations', 'ReservationController@index')->name('admin.reservations');
  // Route::get('/reservations/{id}', 'ReservationController@show')->name('one.reservation');
  Route::get('/reservations/create', 'ReservationController@create')->name('create.reservation');
  Route::post('/reservations', 'ReservationController@adminstore')->name('admin.add.reservation');
  Route::get('/reservations/{reservation}/edit','ReservationController@edit')->name('reservation.edit');
  Route::put('/reservations/{reservation}/update', 'ReservationController@update')->name('reservation.update');
  Route::delete('/reservations/{reservation}','ReservationController@destroy')->name('reservation.delete');

  Route::get('/orders', 'OrderController@adminIndex')->name('admin.orders');
  Route::get('/order/{id}', 'OrderController@adminShow')->name('admin.order');

});

Route::post('/shoppingcart', 'ShoppingCartController@addToCart')->name('add.cart');
Route::get('/shoppingcart', 'ShoppingCartController@index')->name('show.cart');
Route::post('/shoppingcartDishDelete', 'ShoppingCartController@destroy')->name('cart.dish.delete');
Route::post('/deleteByOne', 'ShoppingCartController@deleteByOne')->name('deleteByOne');

// Route::get('/checkout', 'OrderController@checkout')->name('checkout')->middleware('auth');
Route::get('/profile', 'UserController@show')->name('users.profile');

Route::post('/reservation', 'ReservationController@store')->name('add.reservation');

//CART//
Route::get('/addDIsh/{dishId}', 'CartController@addItem')->name('addToCart');
Route::get('/cart', 'CartController@showCart')->name('showCart');
Route::delete('/cart/{cartItem}', 'CartController@destroy')->name('itemCart.delete');
Route::get('/addDishAjax/{dishId}', 'CartController@addItemAjax')->name('add.ajax');

//ORDER//
Route::get('/checkout', 'OrderController@checkout')->name('checkout');
