<?php

namespace App\Repositories;

use App\Models\cart\Cart;

class CartRepository
{
    public function addToCart($productId)
    {
        $cartItem = Cart::whereProductId( $productId)->first();
        if (!$cartItem) {


            $cartItem= Cart::create([
                'product_id' => $productId,
                'user_id' => auth()->user()->id,

            ]);
        }
        return $cartItem;
    }

    public function removeFromCart($productId)
    {
        $cartItem= Cart::whereProductId( $productId)->first();
        if($cartItem){
          return  $cartItem->delete();
        }
        return false;
    }

    public function incrementItem($productId)
    {
        $cartItem = Cart::whereProductId( $productId)->first();
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        }
    }

    public function decrementItem($productId)
    {
        $cartItem = Cart::whereProductId( $productId)->first();
        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity--;
            $cartItem->save();
            return true;
        }
        else{
            return false;
        }
    }

    public function clearCart()
    {
        Cart::where('user_id',auth()->user()->getAuthIdentifier())->delete;
    }

}
