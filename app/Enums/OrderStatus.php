<?php

namespace App\Enums;

enum OrderStatus: string
{
    case CREATED = 'CREATED';
    case PAID = 'PAID';
    case SENT_TO_SUPPLIER = 'SENT_TO_SUPPLIER';
    case SHIPPED = 'SHIPPED';
    case CANCELLED = 'CANCELLED';
}
