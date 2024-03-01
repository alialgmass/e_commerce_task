<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Base\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cart\ChangeItemCountRequest;
use App\Models\products\Product;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Cart\AddRequest;
class CartController extends ApiController
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addToCart(AddRequest $request)
    {
        $productId = $request->input('product_id');

        $this->cartRepository->addToCart($productId);
        return $this->getResponse(200, 'Item added to cart.');

    }

    public function removeFromCart(Product $product)
    {

        if(!$this->cartRepository->removeFromCart($product->id)){
            return $this->getResponse(404, 'Item not found in cart.');
        }
        return $this->getResponse(200, 'Item removed from cart.');

    }

    public function changeItemCount(ChangeItemCountRequest $request)
    {
        $product_id=$request->input('product_id');
        if ($request->input('operation') == '+') {
            return $this->incrementItem($product_id);
        }
        else{
            return $this->decrementItem($product_id);
        }
    }

    public function incrementItem($productId)
    {
        if(!$this->cartRepository->incrementItem($productId)){
            return $this->getResponse(404, 'Item not found');
        }
        return $this->getResponse(200, 'Item incremented successfully');
    }

    public function decrementItem($productId)
    {
        if(!$this->cartRepository->decrementItem($productId)){
            return $this->getResponse(404, 'Item not found or quantity =1');
        }
        return $this->getResponse(200, 'Item decremented successfully');
    }


}
