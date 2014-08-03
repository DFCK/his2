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

Route::controller('tpl','TplController');
Route::controller('dashboard','DashboardController');
Route::controller('pas','PasController');
Route::controller('admin','AdminController');
Route::any('login',array('before'=>'guest','uses'=>'UserController@login'));
Route::any('logout','UserController@logout');
Route::controller('hrm','HrmController');
Route::controller('radt','RadtController');


Route::get('/','HomeController@getIndex');






