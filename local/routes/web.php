<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\GownController;
use App\Http\Controllers\reservationController;



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


Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/',[HomeController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/about',[AboutController::class, 'index']);
Route::get('/logout',[LoginController::class, 'logout']);
Route::get('/services_catering',[CateringController::class, 'index']);
Route::get('/services_gown',[GownController::class, 'index']);


Route::get('/reservation/{services}',[reservationController::class, 'reservation_form']);


