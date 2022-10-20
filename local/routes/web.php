<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\GownController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\admin_reservationController;



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
// Route::get('/',[HomeController::class, 'index']);

Route::get('/', function () {
    return redirect('/landing');
});


Route::get('/landing',[AboutController::class, 'landing']);

Route::get('/contact',[ContactController::class, 'index']);
Route::get('/about',[AboutController::class, 'index']);
Route::get('/logout',[LoginController::class, 'logout']);
Route::get('/services_catering',[CateringController::class, 'index']);
Route::get('/services_gown',[GownController::class, 'index']);


Route::get('/reservation/{services}',[reservationController::class, 'reservation_form']);
Route::post('reservation/customer',[reservationController::class, 'reservation_customer']);
Route::get('/reservation/finalize/{id}',[reservationController::class, 'finalize_order']);
Route::post('add_order',[reservationController::class, 'add_order']);
Route::post('add_addon',[reservationController::class, 'add_addon']);
Route::post('submit_order',[reservationController::class, 'submit_order']);

Route::group(['middleware' => ['web', 'auth'] ], function () {
    Route::get('/admin/home',[AdminHomeController::class, 'index']);
    Route::get('/admin/reservation',[AdminHomeController::class, 'reservation']);

Route::post('reserv/gentable',[admin_reservationController::class, 'genTable']);
Route::post('reserv/getOrderList',[admin_reservationController::class, 'getOrderList']);
Route::post('approval_process',[admin_reservationController::class, 'approval_process']);
    



});



