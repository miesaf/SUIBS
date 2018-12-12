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
    $config = array();
    $config['center'] = 'Jasin, Melaka';
    $config['zoom'] = '14';
    $config['map_height'] = '500px';
    $config['scrollwheel'] = false;

    GMaps::initialize($config);

    $map = GMaps::create_map();

   // echo $map['js'];
   // echo $map['html'];
    return view('welcome')->with('map', $map);
});
Route::get('/logout', function(){
    Auth::logout();
    return redirect("/");
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/borrower', 'BorrowerController@index');
Route::resource('borrower', 'BorrowerController');


Route::get('/inventory', 'InventoryController@index');
Route::resource('inventory', 'InventoryController');


Route::get('/borrowInventory', 'BorrowerInventoryController@index');

//Route::get('/borrowInventory', 'BorrowerInventoryController@create');

//Route::resource('/inventory', 'InventoryController');
