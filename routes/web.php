<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'homeController@home');
Route::get('essence/{toFind}', 'essenceController@essence');

Route::get('login', 'loginController@loginGet');
Route::post('login', 'loginController@loginPost');


Route::get('signup', 'signupController@signup');
Route::get('checkUsername/{toCheck}', 'signupController@checkUsername');
Route::get('checkEmail/{toCheck}', 'signupController@checkEmail');
Route::post('signup', 'signupController@signupPost');

Route::get('logout', 'logoutController@logout');

Route::get('shop', 'shopController@shop');
Route::get('makeShopping', 'shopController@makeShopping');
Route::get('shoppings', 'shopController@shoppings');
Route::get('product/{toFind}', 'productController@product');
Route::get('cartProducts', 'cartController@cartProducts');
Route::post('addToCart', 'cartController@addToCart');
Route::post('removeFromCart', 'cartController@removeFromCart');

?>

