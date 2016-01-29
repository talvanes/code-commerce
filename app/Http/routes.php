<form action="#" method="POST">
    <input type="hidden" name="_method" value="PUT"/>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
</form>

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

Route::get('/exemplo2', function(){
    return "Oi";
});

// AdminCategoriesController
//Route::get('admin/categories', "AdminCategoriesController@index");

// AdminProductsController
//Route::get('admin/products', "AdminProductsController@index");

// Gropued Routes
Route::group(['prefix' => 'admin'], function () {
   
   // AdminCategoriesController
   Route::get('categories', "AdminCategoriesController@index");
   Route::get('category/{category}', "AdminCategoriesController@show");
   
   // AdminProductsController
   Route::get('products', "AdminProductsController@index");
   Route::get('product/{product}', "AdminProductsController@show");
});


// Parameters in URL
Route::pattern('id', '[0-9]+');

Route::get('user/{id?}', function ($id = null){
    if (!empty($id)):
        return "Olá, User ID {$id}!";
    endif;
    
    return "User ID inválido!";
});

// Named routes
/*
Route::get('produtos-legais', [ 'as' => 'produtos', function() {
    echo Route::currentRouteName();
}]);

redirect()->route('produtos');
echo route('produtos');
*/

// Passing Models into Routes
Route::get('category/{category}', function(\PortalComercial\Category $category){
    return $category->name;
});
