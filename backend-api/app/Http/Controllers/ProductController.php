<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductRepository $ProductRepository)
    {
        $this->repository = $ProductRepository;
    }

    public function index(Request $request)
    {
        return ProductResource::collection($this->repository->all());
    }
}
