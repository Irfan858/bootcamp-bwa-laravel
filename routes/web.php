<?php

use Illuminate\Support\Facades\Route;

//Backsite
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\UserTypeController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\AppointmentBacksiteController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ReportController;


//Frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\AppointmentController;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::get('register-success', function () {
    return view('pages.frontsite.success.signup-success');
});

Route::get('payment-success', function () {
    return view('pages.frontsite.success.payment-success');
});


Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']],
function () {
    //Dashboard Page
    Route::resource('dashboard', DashboardController::class);

    // Start Management Access Route
        //Permission Page
        Route::resource('permission', PermissionController::class);

        //Role Page
        Route::resource('role', RoleController::class);

        //User Page
        Route::resource('user', UserController::class);

        //User Type Page
        Route::resource('user-type', UserTypeController::class);

    //End Management Access Route

    //Start Master Data Route
        //Config Payment Page
        Route::resource('config-payment', ConfigPaymentController::class);

        //Consultation Page
        Route::resource('consultation', ConsultationController::class);

        //Specialist Page
        Route::resource('specialist', SpecialistController::class);

    // End Master Data Route

    // Start Operational Route

        //Doctor Page
        Route::resource('doctor', DoctorController::class);

        //Appointment Page
        Route::resource('appointment', AppointmentBacksiteController::class);

        //Transaction Page
        Route::resource('transaction', TransactionController::class);

        //Report Page
        Route::resource('report', ReportController::class);

    // End Operational Route
});
