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
    return redirect('/login');
});


Auth::routes();

Route::resource('appcust','CustomersApplation');


Route::post('/reservation','CustomersApplation@index')->name('applations.index');


Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function (){

    Route::get('dashboard', 'Dashboard@index')->name('admin.dashboard');
    Route::get('lastTrans', 'Dashboard@lastTransform')->name('admin.lastTransform');
    Route::get('allCustomers', 'Dashboard@allCustomers')->name('admin.allCustomers');
    Route::get('user/{id}', 'Dashboard@editUser')->name('admin.user');
    Route::put('userupdate/{id}', 'Dashboard@userUpdate')->name('admin.userupdate');


    Route::get('wallet_update_add/{id}/{value}/{user_id}', 'Wallets@wallet_update_add');
    Route::get('wallet_update_delete/{id}/{value}/{user_id}', 'Wallets@wallet_update_delete');


    Route::get('customer', 'Dash@index')->name('admin.dash');
    Route::get('transform', 'Dash@transform')->name('admin.transform');
    Route::post('transformTo', 'Dash@transformTo')->name('admin.transformTo');

    Route::resource('cusProcesses','CustomersProcesses');
    Route::resource('customers','Customers');

});