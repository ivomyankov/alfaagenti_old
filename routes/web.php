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
/*
Route::get('/home', function () {
    return view('home/home');
});
*/

Route::get('/', 'App\Http\Controllers\HomeController@getImotiHome')->name('home');
Route::get('/имоти', 'App\Http\Controllers\HomeController@getImotiImoti')->name('imoti');
Route::get('/имоти/наем', 'App\Http\Controllers\HomeController@getImotiNaem')->name('naem');
Route::get('/имоти/продажба', 'App\Http\Controllers\HomeController@getImotiProdajba')->name('prodajba');
Route::get('/имоти/филтър', 'App\Http\Controllers\HomeController@getImotiFiltar');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@test');
Route::get('/dashboard/imoti', 'App\Http\Controllers\DashboardController@getImoti')->name('dash-imoti');
Route::get('/dashboard/imot/{id}', 'App\Http\Controllers\ImotiController@imot')->name('dash-imot');
Route::get('/dashboard/{id}/imoti', 'App\Http\Controllers\ImotiController@agentsImoti')->name('dash-agents-imoti');



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
