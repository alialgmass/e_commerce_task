<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Base\ApiController;

use App\Http\Resources\products\ProductResource;
use App\Models\products\Product;
use App\Repositories\ProductRepository;

class ProductController extends  ApiController
{
    protected  $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();
      return  $this->getResponse(200,'success',['products' =>ProductResource::collection($products)],[],$products);

    }

    public function show(Product $product)
    {
        return  $this->getResponse(200,'success',['product' =>ProductResource::make($product)]);
    }


}
