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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createqr', 'createqrController@create');

//Route::post('store', ['as' => 'createqrform.store', 'uses' => 'createqrController@store']);
Route::get('/showqr', 'createqrcontroller@index');

Route::get('/genqr', function(){
    return view('genqr');
});

Route::get('/scanqr', function(){
    return view('scanqr');
});

//Route::post('store', ['as' => 'newcreateqr.store', 'uses' =>'NewqrcodeController@store']);


//Route::post('save', ['as' => 'scanqrController.save', 'uses' =>'scanqrController@store']);
Route::post("/save", "scanqrController@store");

Route::get('/scanshow', function(){
    return view('scanshow');
});

Route::resource('api/items', 'ItemsController');

Route::get("/runmultiqr", "multipleqrController@multiqr");


