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
// Another custom route (Closure)
Route::get('/exemplo2', function(){
    return "Oi";
});

// Categories //
Route::get('categories', ['as' => 'categories', 'uses' => "CategoryController@index"]);
Route::post('categories', ['as' => 'categories.store', 'uses' => "CategoryController@store"]);
Route::get('categories/create', ['as' => 'categories.create', 'uses' => "CategoryController@create"]);
Route::get('categories/{id}/destroy', ['as' => 'categories.destroy', 'uses' => "CategoryController@destroy"]);
Route::get('categories/{id}/edit', ['as' => 'categories.edit', 'uses' => "CategoryController@edit"]);
Route::put('categories/{id}/update', ['as' => 'categories.update', 'uses' => "CategoryController@update"]);
// Products //
Route::get('products', ['as' => 'products', 'uses' => "ProductController@index"]);
Route::post('products', ['as' => 'products.store', 'uses' => "ProductController@store"]);
Route::get('products/create', ['as' => 'products.create', 'uses' => "ProductController@create"]);
Route::get('products/{id}/edit', ['as' => 'products.edit', 'uses' => "ProductController@edit"]);
Route::put('products/{id}/update', ['as' => 'products.update', 'uses' => "ProductController@update"]);
Route::get('products/{id}/destroy', ['as' => 'products.destroy', 'uses' => "ProductController@destroy"]);

// Another custom routes examploe (using closures)
/*
Route::get('/exemplo2', function () {
    return "Oi!";
});
Route::post('/exemplo2', function () {
    return "Oi!";
});
*/

/*
Route::match(['get','post'], '/exemplo2', function(){
   return "Get or Post"; 
});
Route::any('/exemplo2', function () {
    return "Any";
});
*/

// AdminCategoriesController
//Route::get('admin/categories', "AdminCategoriesController@index");

// AdminProductsController
//Route::get('admin/products', "AdminProductsController@index");

// Gropued Routes
/*Route::group(['prefix' => 'admin'], function () {
   
   // AdminCategoriesController
   Route::get('categories', "AdminCategoriesController@index");
   Route::get('category/{category}', "AdminCategoriesController@show");
   
   // AdminProductsController
   Route::get('products', "AdminProductsController@index");
   Route::get('product/{product}', "AdminProductsController@show");
});*/


// Parameters in URL
/*Route::pattern('id', '[0-9]+');

Route::get('user/{id?}', function ($id = null){
    if (!empty($id)):
        return "Olá, User ID {$id}!";
    endif;
    
    return "User ID inválido!";
});*/

// Named routes
/*
Route::get('produtos-legais', [ 'as' => 'produtos', function() {
    echo Route::currentRouteName();
}]);

redirect()->route('produtos');
echo route('produtos');
*/

// Passing Models into Routes
/*Route::get('category/{category}', function(\PortalComercial\Category $category){
    return $category->name;
});*/
