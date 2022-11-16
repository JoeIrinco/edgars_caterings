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
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventsAddController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\sendEmailController;




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

Route::get('/wedding',[CateringController::class, 'wedding']);
Route::get('/kids',[CateringController::class, 'kids']);
Route::get('/christening',[CateringController::class, 'christening']);
Route::get('/corporate',[CateringController::class, 'corporate']);
Route::get('/debut',[CateringController::class, 'debut']);

Route::get('/services_gown',[GownController::class, 'index']);

Route::get('/reservation/{services}',[reservationController::class, 'reservation_form']);
Route::post('reservation/customer',[reservationController::class, 'reservation_customer']);
Route::get('/reservation/finalize/{id}',[reservationController::class, 'finalize_order']);
Route::post('add_order',[reservationController::class, 'add_order']);
Route::post('add_addon',[reservationController::class, 'add_addon']);
Route::post('submit_order',[reservationController::class, 'submit_order']);


Route::get('send_status_email/{emailto}/{nameto}/{reservationid}/{datetime}/{totalprice}/{status}',[sendEmailController::class, 'sendEmail']);


Route::group(['middleware' => ['web', 'auth'] ], function () {
Route::get('/admin/home',[AdminHomeController::class, 'index']);

Route::get('/admin/reservation',[AdminHomeController::class, 'reservation']);
Route::post('reserv/gentable',[admin_reservationController::class, 'genTable']);
Route::post('reserv/getOrderList',[admin_reservationController::class, 'getOrderList']);
Route::post('approval_process',[admin_reservationController::class, 'approval_process']);
Route::get('/admin/home', function () {
    return redirect('/admin/reservation');
});




Route::get('/admin/customers',[CustomerController::class, 'index']);
Route::post('customers/gentable',[CustomerController::class, 'genTable']);
Route::post('customers/update_view',[CustomerController::class, 'update_view']);
Route::post('customers/update',[CustomerController::class, 'update']);

Route::get('/admin/events/additional',[EventsAddController::class, 'index']);
Route::post('events/additional/gentable',[EventsAddController::class, 'gentable']);
Route::post('events/additional/add',[EventsAddController::class, 'add']);
Route::post('events/additional/update_view',[EventsAddController::class, 'update_view']);
Route::post('events/additional/update',[EventsAddController::class, 'update']);
Route::post('events/additional/delete',[EventsAddController::class, 'delete']);
Route::post('events/additional/activate',[EventsAddController::class, 'activate']);
Route::post('events/additional/deactivate',[EventsAddController::class, 'deactivate']);

Route::get('/admin/package',[PackageController::class, 'index']);
Route::post('package/gentable',[PackageController::class, 'gentable']);
Route::post('package/add',[PackageController::class, 'add']);
Route::post('package/update_view',[PackageController::class, 'update_view']);
Route::post('package/update',[PackageController::class, 'update']);
Route::post('package/delete',[PackageController::class, 'delete']);
Route::post('package/activate',[PackageController::class, 'activate']);
Route::post('package/deactivate',[PackageController::class, 'deactivate']);







    
});



