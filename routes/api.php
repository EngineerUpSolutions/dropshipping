<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::middleware(['auth:sanctum', 'throttle:pay-order'])
    ->post('/orders/{order}/pay', [OrderController::class, 'pay'])
    ->name('orders.pay');
