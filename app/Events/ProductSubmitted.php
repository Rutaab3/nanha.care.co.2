<?php

namespace App\Events;

use App\Models\Marketplace\Product;
use Illuminate\Foundation\Events\Dispatchable;

class ProductSubmitted
{
    use Dispatchable;

    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
