<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\InventoryRepository;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importProducts(Request $request, ProductRepository $productRepository)
    {
        return $productRepository->import($request->file('file'));
    }

    public function importInventories(Request $request, InventoryRepository $inventoryRepository)
    {
        return $inventoryRepository->import($request->file('file'));
    }
}
