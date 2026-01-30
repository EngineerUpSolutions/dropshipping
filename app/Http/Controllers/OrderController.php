<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\Orders\OrderService;
use App\Enums\OrderStatus;

class OrderController extends Controller
{
    public function pay(
        Order $order,
        OrderService $orderService,
        PayOrderRequest $request
    ) {
        $orderService->changeStatus(
            $order,
            OrderStatus::PAID,
            $request->user()->email ?? 'system'
        );

        return (new OrderResource($order))
            ->additional(['message' => 'Order paid successfully']);
    }
}
