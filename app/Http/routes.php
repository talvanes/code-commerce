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

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function(){
	
	// Categories //
	Route::group(['prefix' => 'categories'], function(){
		Route::get('/', ['as' => 'categories', 'uses' => "CategoryController@index"]);
		Route::post('/', ['as' => 'categories.store', 'uses' => "CategoryController@store"]);
		Route::get('create', ['as' => 'categories.create', 'uses' => "CategoryController@create"]);
		Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => "CategoryController@destroy"]);
		Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => "CategoryController@edit"]);
		Route::put('{id}/update', ['as' => 'categories.update', 'uses' => "CategoryController@update"]);
	});
	
	// Products //
	Route::group(['prefix' => 'products'], function(){
		Route::get('/', ['as' => 'products', 'uses' => "ProductController@index"]);
		Route::post('/', ['as' => 'products.store', 'uses' => "ProductController@store"]);
		Route::get('create', ['as' => 'products.create', 'uses' => "ProductController@create"]);
		Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => "ProductController@edit"]);
		Route::put('{id}/update', ['as' => 'products.update', 'uses' => "ProductController@update"]);
		Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => "ProductController@destroy"]);

		// site.com.br/admin/products/images/{id}/product
		Route::group(['prefix' => 'images'], function(){

			Route::get('{id}/product', ['as' => 'products.image', 'uses' => "ProductController@image"]);
			Route::get('create/{id}/product', ['as' => 'products.image.create', 'uses' => "ProductController@createImage"]);
			Route::post('store/{id}/product', ['as' => 'products.image.store', 'uses' => "ProductController@storeImage"]);
			Route::get('destroy/{id}/image', ['as' => 'products.image.destroy', 'uses' => "ProductController@destroyImage"]);

		});

	});
	
	// Users //
	
});



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
