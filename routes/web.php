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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/documentations', array(
	'as'=>'docs',
	'uses'=>'Controller@documentation'
));

Route::get('/tests', array(
	'as' => 'tests',
	'uses' => 'Controller@allCoins'
));

Route::get('/coin/{coin}', array(
	'as' => 'coin',
	'uses' => 'Controller@coin'
));

/***
 * if connected
 * ***/

Route::get('/dashboard', array(
	'as'=>'dashboard',
	'uses'=>'UserController@getDashboard'
))->middleware('auth');

// account

Route::get('/userProfile', array(
	'as'=>'profile',
	'uses' => 'UserController@getProfile'
))->middleware('auth');


// addresses

Route::get('/comptes', array(
	'as'=>'comptes',
	'uses'=>'UserController@getAddresses'
))->middleware('auth');

Route::get('/address/{address}', array(
	'as' => 'address',
	'uses'=> "UserController@getAddress"
));

Route::get('/addressCreate', array(
	'as' => 'creer-adresse',
	'uses' =>'UserController@createAddress'
));

// transactions

Route::get('/seeAllTransactions', array(
	'as'=>'seeAllTransactions',
	'uses'=>'UserController@seeAllTransactions'
))->middleware('auth');

Route::get('/seeMyTransactions', array(
	'as'=>'seeMyTransactions',
	'uses'=>'UserController@seeMyTransactions'
))->middleware('auth');

Route::get('/doTransaction', array(
	'as'=>'doTransaction',
	'uses'=>'UserController@doTransaction'
))->middleware('auth');