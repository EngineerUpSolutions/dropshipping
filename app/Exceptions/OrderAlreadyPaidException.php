<?php

namespace App\Exceptions;

use RuntimeException;

class OrderAlreadyPaidException extends RuntimeException
{
    public function __construct(string $message = 'Order is already paid')
    {
        parent::__construct($message);
    }
}
