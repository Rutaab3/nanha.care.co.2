<?php

namespace App\Http\Controllers;

use App\Enums\ContentStatus;
use App\Models\Marketplace\Product;
use App\Models\Marketplace\Shop;

class ShopController extends Controller
{
    public function public($slug)
    {
        $shop = Shop::where('slug', $slug)->firstOrFail();

        $products = Product::where('shop_id', $shop->id)
            ->where('status', ContentStatus::Published->value)
            ->with('images')
            ->paginate(12);

        return view('shop.public', compact('shop', 'products'));
    }
}
