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

// Map at Dashboard
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
})->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/borrower', 'BorrowerController@index');
//Route::resource('borrower', 'BorrowerController');

// Borrower
Route::resource('borrower','BorrowerController');
Route::get('/borrower', 'BorrowerController@index')->name('borrower.index');
Route::post('/borrower/create','BorrowerController@create')->name('borrower.create');
Route::post('/borrower/store','BorrowerController@store');
Route::get('borrower-delete/{id}','BorrowerController@destroy');

// Inventory
Route::get('/inventory', 'InventoryController@index')->name('inventory.index');
Route::post('/inventory/create','InventoryController@create')->name('inventory.create');
Route::post('/inventory/store', "InventoryController@store");
Route::get('inventory-delete/{id}', 'InventoryController@destroy');
Route::get('/inventory/create', function() {
    return view('create');
});

// dfghjuygfdghjuk
Route::resource('inventory', 'InventoryController');
Route::resource('borrower', 'BorrowerController');

//Route::get('borrower-edit/{id}/edit','BorrowerController@edit');
//Route::get('borrower-update/{id}','BorrowerController@update');

//Route::get('/borrowInventory', 'BorrowerInventoryController@index');
//Route::get('/borrowInventory', 'BorrowerInventoryController@create');
//Route::resource('/inventory', 'InventoryController');
