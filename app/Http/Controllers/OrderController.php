<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Services\Orders\OrderService;
use App\Enums\OrderStatus;

class OrderController extends Controller
{
    public function pay(
        Order $order,
        OrderService $orderService,
        Request $request
    ) {
        $orderService->changeStatus(
            $order, 
            OrderStatus::PAID,
            $request->user()->email ?? 'system'
        );

        return response()->json([
            'message' => 'Order paid successfully'
        ]);
    }
}
