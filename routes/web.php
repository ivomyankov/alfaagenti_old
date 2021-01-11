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

Route::get('/dashboard/imoti', 'App\Http\Controllers\ImotiController@count')->name('dash-imoti');
Route::get('/dashboard/{id}/imoti', 'App\Http\Controllers\ImotiController@agentsImoti')->name('dash-agents-imoti');

Route::get('/dashboard', function () {
    $data=[
      'var1'=>'something',
      'var2'=>'something',
      'var3'=>'something',
    ];
    return view('vendor/adminlte/dashboard', ['name' => 'James']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
