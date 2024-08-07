<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'index');
    Route::post('/payment', 'processPayment');
    Route::get('/thank-you', 'thankYou');
});
