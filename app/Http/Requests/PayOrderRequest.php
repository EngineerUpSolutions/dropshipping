<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        $order = $this->route('order'); // viene de /orders/{order}/pay
        return $this->user()?->can('pay', $order) ?? false;
    }

    public function rules(): array
    {
        // Este endpoint no recibe payload.
        return [];
    }
}
