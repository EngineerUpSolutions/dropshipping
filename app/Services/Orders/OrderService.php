<?php

namespace App\Services\Orders;

use App\Domain\Orders\OrderStatusTransitions;
use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class OrderService
{
    /**
     * Cambia el estado de una orden aplicando reglas de negocio
     */
    public function changeStatus(
        Order $order,
        OrderStatus $to,
        string $changedBy
    ): void {
        // Estado actual (string -> enum)
        $from = OrderStatus::from($order->status);

        // Validar transición
        if (! OrderStatusTransitions::canTransition($from, $to)) {
            throw new RuntimeException(
                "Invalid order status transition: {$from->value} → {$to->value}"
            );
        }

        // Ejecutar cambio de forma atómica
        DB::transaction(function () use ($order, $from, $to, $changedBy) {
            // Cambiar estado
            $order->status = $to->value;
            $order->save();

            // Aquí luego:
            // - historial
            // - eventos
        });
    }
}
