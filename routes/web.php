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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','TestController@welcome');

/*Route::get('/prueba', function(){
	return ' hola soy una prueba';
});
*/

Auth::routes();

Route::get('/search', 'SearchController@show')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show'); // formulario de regitro
Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');
Route::get('/categories/{category}', 'CategoryController@show');

//namespace admin
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
   //cr (crear-leer) productos
Route::get('/products', 'ProductController@index'); //listado
Route::get('/products/create', 'ProductController@create'); // formulario de regitro
Route::post('/products', 'ProductController@store'); // guardar,registrar datos por post
Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario de regitro
Route::post('/products/{id}/edit', 'ProductController@update'); // guardar,registrar datos por post
Route::delete('/products/{id}', 'ProductController@destroy'); // eliminar
//PUT PATCH DELETE
//rutas d elas imagenes
Route::get('/products/{id}/images', 'ImageController@index'); // listado de imagenes
Route::post('/products/{id}/images', 'ImageController@store'); // guardar las imagenes
Route::delete('/products/{id}/images', 'ImageController@destroy'); // eliminar
Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // eliminar

Route::get('/categories', 'CategoryController@index'); //listado
Route::get('/categories/create', 'CategoryController@create'); // formulario de regitro
Route::post('/categories', 'CategoryController@store'); // guardar,registrar datos por post
Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario de regitro
Route::post('/categories/{category}/edit', 'CategoryController@update'); // guardar,registrar datos 
Route::delete('/categories/{category}', 'CategoryController@destroy'); // eliminar
});

