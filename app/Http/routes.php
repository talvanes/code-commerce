<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Custom route (Controller)
Route::get('exemplo', "Exemplo@exemplo");

// AdminCategoriesController
Route::get('admin/categories', "AdminCategoriesController@index");

// AdminProductsController
Route::get('admin/products', "AdminProductsController@index");
