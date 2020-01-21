<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Services\ProductService;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * @param ProductService $productService
     * @return ProductCollection
     */
    public function index(ProductService $productService): ProductCollection
    {
        return new ProductCollection($productService->all());
    }
}
