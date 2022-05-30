<?php

use App\Http\Controllers\Midtrans\MidtransController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('payment-handler', [MidtransController::class, 'payment_handler']);

Route::get('payment/success', [MidtransController::class, 'success']);
Route::get('payment/error', [MidtransController::class, 'error']);
Route::get('payment/unfinish', [MidtransController::class, 'unfinish']);


// Route::post('midtans/callback',[MidtransController::class, 'callback']);
