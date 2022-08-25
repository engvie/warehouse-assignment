<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(ProductRepository $ProductRepository)
    {
        $this->repository = $ProductRepository;
    }

    public function index(Request $request)
    {
        return $this->repository->test();
    }
}
