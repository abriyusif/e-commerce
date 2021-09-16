<?php
//Auth::routes();
Route::group(['prefix' => 'normal'], function() {
    Route::get('/', function () {
        return view('frontend.index');
    });
    Route::get('userlogin','Admin\LoginController@showNormalForm');
    Route::post('loginUser','Admin\LoginController@normalLogin')->name('normal.login');
    Route::get('logoutUser','Admin\LoginController@logoutUser')->name('normal.logout');
    Route::get('getLatest','ProductsController@fetchLatest');
    Route::get('getCats','CategoriesController@getCats');
    Route::get('getBrans','BrandsController@getBrans');
   Route::get('getSubCats','SubCategoriesController@getSubCats');
//    Route::get('fetchSingle/{id}','ProductsController@fetchSingleProduct');
//Route::post('processnewPayment','ProductsController@processPayment');
Route::post('processnewPayment','ProductsController@processPayment');
Route::post('validate','UserController@validateQuestions');
    Route::group(['middleware' => ['auth:normal']],function ()
    {
        Route::get('userAuth',function(){
            return view('frontend.user_page');
        });
       
        Route::get('fetchSingle/{id}','ProductsController@fetchSingleProduct');

        
        // Route::post('/processnewPayment','ProductsController@processPayment');

      
    });
});

?>