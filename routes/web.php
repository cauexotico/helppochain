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

//Route::resource('users','UserController');

Route::resource('projects','ProjectController');
Route::resource('blockchains','BlockchainController');
//Route::resource('blockchains/{blockchain}/blocks','BlockController');

Route::resource('blockchains/{blockchain}/transactions','TransactionController');

// Route::get('blockchains/{blockchain}/blocks','BlockController@index')
// 	->name('block.index');

// Route::get('blockchains/{blockchain}/blocks/{block}','BlockController@show')
// 	->name('block.show');


// Route::get('blockchains/{blockchain}/create','BlockController@create')
// 	->name('block.create');
// Route::post('blockchains/{blockchain}/create','BlockController@store')
// 	->name('block.store');
