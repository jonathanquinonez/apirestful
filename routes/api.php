<?php

use Illuminate\Http\Request;

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

/**
* Buyers
*/
Route::resource('buyers','buyer\BuyerController',['only' => ['index','show']]);
/**
* Sellers
*/
Route::resource('sellers','seller\SellerController',['only' => ['index','show']]);
/**
* Products
*/
Route::resource('products','product\ProductController',['only' => ['index','show']]);
/**
* Categories
*/
Route::resource('categories','category\CategoryController',['except' =>['create','edit']]);
/**
* Transactions
*/
Route::resource('transactions','transaction\TransactionController',['only' => ['index','show']]);
/**
* User
*/
Route::resource('users','User\UserController',['except' =>['create','edit']]);
