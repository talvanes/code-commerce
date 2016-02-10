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

Route::get('/', "StoreController@index");
Route::get('category/{id}', ['as' => 'store.category', 'uses' => "StoreController@category"]);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => "StoreController@product"]);
Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => "StoreController@tag"]);

Route::get('cart', ['as' => 'cart', 'uses' => "CartController@index"]);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => "CartController@add"]);
Route::get('cart/remove/{id}', ['as' => 'cart.remove', 'uses' => "CartController@remove"]);

/* Routes which demand user authentication */
Route::group(['middleware' => 'auth'], function(){
	Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => "CheckoutController@place"]);

	Route::group(['prefix' => 'account'], function(){
		Route::get('orders', ['as' => 'account.orders', 'uses' => "AccountController@orders"]);
		Route::get('order/{id}/status', ['as' => 'account.order.status', 'uses' => "AccountController@status"]);
		Route::put('order/{id}/status/update', ['as' => 'account.order.status.store', 'uses' => "AccountController@storeStatus"]);
	});

});


// Custom route (Controller)
Route::get('exemplo', "Exemplo@exemplo");
// Another custom route (Closure)
Route::get('/exemplo2', function(){
    return "Oi";
});

/* ADMIN group */
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'where' => ['id' => '[0-9]+', 'tag' => '[0-9]+']], function(){
	
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

		Route::get('{id}/tags', ['as' => 'product.tags.index', 'uses' => "ProductController@productTags"]);
		Route::get('{id}/tags/add', ['as' => 'product.tags.add', 'uses' => "ProductController@addProductTags"]);
		Route::post('{id}/tags/store', ['as' => 'product.tags.store', 'uses' => "ProductController@storeProductTags"]);
		Route::get('{id}/tags/{tag}/delete', ['as' => 'product.tags.delete', 'uses' => "ProductController@deleteProductTags"]);

		// site.com.br/admin/products/images/{id}/product
		Route::group(['prefix' => 'images'], function(){

			Route::get('{id}/product', ['as' => 'products.image', 'uses' => "ProductController@image"]);
			Route::get('create/{id}/product', ['as' => 'products.image.create', 'uses' => "ProductController@createImage"]);
			Route::post('store/{id}/product', ['as' => 'products.image.store', 'uses' => "ProductController@storeImage"]);
			Route::get('destroy/{id}/image', ['as' => 'products.image.destroy', 'uses' => "ProductController@destroyImage"]);

		});

		// site.com.br/admin/products/tags
		Route::group(['prefix' => 'tags'], function(){

			Route::get('/', ['as' => 'products.tags', 'uses' => "ProductController@tags"]);
			Route::get('create', ['as' => 'products.tags.create', 'uses' => "ProductController@tagCreate"]);
			Route::post('store', ['as' => 'products.tags.store', 'uses' => "ProductController@tagStore"]);
			Route::get('{id}/delete', ['as' => 'products.tags.delete', 'uses' => "ProductController@tagDelete"]);

		});

	});
	
	// Users //
	
});


// Route controllers
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'test' => 'TestController'
]);



// Another custom routes example (using closures)
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
