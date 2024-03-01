<?php

namespace App\Repositories;


use App\Models\products\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::paginate(25);
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }


}
