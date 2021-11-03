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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('emp')->group(function() {
    Route::resource('users', 'UserController')->middleware('can:users-list');
    Route::resource('roles', 'Admin\RoleController')->middleware('can:roles-list');
    Route::resource('permissions', 'Admin\PermissionController')->middleware('can:roles-list');
    Route::resource('employees', 'EmployeeController');
    Route::resource('addresses', 'AddressController');

    Route::prefix('employees')->group(function() {
        Route::post('{id}/restore', 'EmployeeController@restore')->name('employees.restore');
    });
    Route::get('history', 'EmployeeController@history')->name('employees.history')->middleware('can:employees-history');

    Route::prefix('select2')->group(function() {
        Route::post('addresses', 'AddressController@getAddresses');
        Route::post('permissions', 'Admin\PermissionController@getPermissions');
    });
});

