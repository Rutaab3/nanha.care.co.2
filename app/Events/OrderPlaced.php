<?php

namespace App\Events;

use App\Models\Marketplace\Order;
use Illuminate\Foundation\Events\Dispatchable;

class OrderPlaced
{
    use Dispatchable;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
