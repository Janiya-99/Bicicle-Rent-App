<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GpsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\V1\CardController;
use App\Http\Controllers\Api\V1\PathController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\OtpSendController;
use App\Http\Controllers\Api\V1\EmployController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\V1\BicycleController;
use App\Http\Controllers\Api\V1\StationController;
use App\Http\Controllers\Api\V1\WeatherController;
use App\Http\Controllers\Api\V1\EmergencyController;
use App\Http\Controllers\Api\V1\UserStatusController;
use App\Http\Controllers\Api\V1\BicycleTypeController;
use App\Http\Controllers\Api\V1\PaymentTypeController;
use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\Api\V1\UserContactController;
use App\Http\Controllers\Api\V1\BicycleStatusController;
use App\Http\Controllers\Api\V1\EmployContactController;
use App\Http\Controllers\Api\V1\RecentActivityController;
use App\Http\Controllers\Api\V1\EmergencyStatusController;
use App\Http\Controllers\Api\V1\TransactionStatusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogOutController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('update-device-token', [OtpSendController::class, 'updateDeviceToken']);
    Route::post('send-notification', [OtpSendController::class, 'sendNotification']);
    Route::post('verify-otp', [OtpSendController::class, 'verifyOtp']);
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('usercontacts', UserContactController::class);
    Route::apiResource('cards', CardController::class);
    Route::apiResource('transactions', TransactionController::class);
    Route::apiResource('userstatuses', UserStatusController::class);
    Route::apiResource('bicycles', BicycleController::class);
    Route::apiResource('bicycletypes', BicycleTypeController::class);
    Route::apiResource('stations', StationController::class);
    Route::apiResource('paths', PathController::class);
    Route::apiResource('paymenttypes', PaymentTypeController::class);
    Route::apiResource('recentactivities', RecentActivityController::class);
    Route::apiResource('employs', EmployController::class);
    Route::apiResource('emergencies', EmergencyController::class);
    Route::apiResource('transactionstatuses', TransactionStatusController::class);
    Route::apiResource('bicyclestatuses', BicycleStatusController::class);
    Route::apiResource('gps', GpsController::class);
    Route::apiResource('employcontacts', EmployContactController::class);
    Route::apiResource('emergencystatuses', EmergencyStatusController::class);
    Route::apiResource('weather', WeatherController::class);
});
