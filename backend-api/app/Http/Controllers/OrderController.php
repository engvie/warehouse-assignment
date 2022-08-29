<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Product $product, Request $request)
    {
        if ($product->available < 1) {
            return \Response::json([
                'error' => 'The stock of this items is not enough to be ordered',
            ], 400);
        }

        foreach ($product->productComponents as $component) {
            $component->inventory->update([
                'stock' => $component->inventory->stock - $component->amount_of,
            ]);
        }
    }
}
