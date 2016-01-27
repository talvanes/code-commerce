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
Route::get('exemplo', function () {
    $nome = 'Talvanes';
    $sobrenome = 'de Sousa';
    
    //return view('exemplo')->with('nome', $nome);
    /*return view('exemplo', [
        'nome' => $nome,
        'sobrenome' => $sobrenome
    ]);*/
    return view('exemplo', compact('nome', 'sobrenome'));
});
