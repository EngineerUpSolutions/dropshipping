<?php
namespace App\Domain\Orders;
use App\Enums\OrderStatus;


final class OrderStatusTransitions
{
    public static function allowedTransitions(): array
    {
        return [
            OrderStatus::CREATED->value => [
                OrderStatus::PAID,
                OrderStatus::CANCELLED,
            ],

            OrderStatus::PAID->value => [
                OrderStatus::SENT_TO_SUPPLIER,
            ],

            OrderStatus::SENT_TO_SUPPLIER->value => [
                OrderStatus::SHIPPED,
            ],

            OrderStatus::SHIPPED->value => [],

            OrderStatus::CANCELLED->value => [],
        ];
    }

    public static function canTransition(
        OrderStatus $from,
        OrderStatus $to
    ): bool {
        $allowedTransitions = self::allowedTransitions();

        return in_array(
            $to,
            $allowedTransitions[$from->value] ?? [],
            true
        );
    }
}
