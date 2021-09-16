<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
});
Route::resource('contacts','ContactController');
Route::view('/admin','admin.dashboard.index');
require_once('admin.php');
require_once('user_auth.php');
Route::resource('products','ProductsController');
Route::get('countProducts','ProductsController@countProducts');
Route::post('products/update','ProductsController@update')->name('products.update');
Route::delete('products/{id}','ProductsController@destroy');
Route::resource('brands','BrandsController');
Route::post('brands/update','BrandsController@update')->name('brands.update');
Route::delete('brands/{id}','BrandsController@destroy');
Route::resource('categories','CategoriesController');
Route::post('categories/update','CategoriesController@update')->name('categories.update');
Route::delete('categories/{id}','CategoriesController@destroy');
Route::resource('users','UserController');
Route::get('countUsers','UserController@countUsers');
Route::get('countOrders','OrdersController@countOrders');
Route::resource('subcategories','SubCategoriesController');
Route::post('subcategories/update','SubCategoriesController@update')->name('subcategories.update');
Route::delete('subcategories/{id}','CategoriesController@destroy');
Route::post('getBrands','BrandsController@getBrands');
Route::post('getSubs','SubCategoriesController@getSubs');
Route::post('getCategories','CategoriesController@getCategories');
Route::get('getLatest','ProductsController@fetchLatest');
Route::get('getCats','CategoriesController@getCats');
Route::get('getBrans','BrandsController@getBrans');
Route::get('getSubCats','SubCategoriesController@getSubCats');
Route::get('getSpecificCategories/{mod}','ProductsController@fetchSpecificCategories');
Route::get('getSpecificSubCategories/{mod}','ProductsController@fetchSpecificSubCategories');
Route::get('getSpecificBrands/{mod}','ProductsController@fetchSpecificBrands');
Route::resource('orders','OrdersController');
Route::resource('messages','MessagesController');

