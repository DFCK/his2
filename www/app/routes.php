<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::any('login', array('before' => 'guest', 'uses' => 'HomeController@getLogin'));
Route::any('logout', 'HomeController@getLogout');
Route::group(array('before' => 'auth'), function() {
    Route::controller('tpl', 'TplController');
    Route::controller('dashboard', 'DashboardController');
    Route::controller('pas', 'PasController');
    Route::controller('admin', 'AdminController');
    Route::controller('hrm', 'HrmController');
    Route::controller('address', 'AddressController');
    Route::controller('cdha', 'CDHAController');
    Route::controller('radt', 'RadtController');
    Route::controller('enc', 'EncounterController');
    Route::controller('ris', 'RisController');
    Route::controller('misc', 'MiscController');
    Route::get('/search/{param?}', 'SearchController@getIndex');
    Route::get('/', 'HomeController@getIndex');
});






