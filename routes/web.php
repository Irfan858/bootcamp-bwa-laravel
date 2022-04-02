<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;
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
// Route::resource('home', LandingController::class);

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // return view('dashboard');

    //Payment Page
    Route::resource('payment', PaymentController::class);

    //Appointment Page
    Route::resource('appointment', AppointmentController::class);
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
