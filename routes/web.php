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
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'App\Http\Controllers\ImotiController@index')->name('home');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@test')->name('dashboard');
Route::get('/dashboard/imoti', 'App\Http\Controllers\ImotiController@count')->name('dash-imoti');
Route::get('/dashboard/imot/{id}', 'App\Http\Controllers\ImotiController@imot')->name('dash-imot');
Route::get('/dashboard/{id}/imoti', 'App\Http\Controllers\ImotiController@agentsImoti')->name('dash-agents-imoti');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
