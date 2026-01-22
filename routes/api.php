<?php
use App\Http\Controllers\OrderController;
Route::post('/orders/{order}/pay', [OrderController::class, 'pay']);




