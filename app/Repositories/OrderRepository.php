<?php

namespace App\Repositories;

use App\Models\Cart;

use App\Models\orders\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    public function store($data)
    {
        $cartItems = $this->getUserCartItems();
        if(!$cartItems->count() > 0){
            return false;
        }
        $totalPrice = $this->calculateTotalPrice($cartItems);
        $orderData = $this->prepareOrderData($data, $totalPrice);
        $order = $this->createOrder($orderData);
        $this->attachOrderItems($order, $cartItems);
        auth()->user()->cart()->delete();
        return $order;
    }

    protected function getUserCartItems()
    {
        return Auth::user()->cart()->get();
    }

    protected function calculateTotalPrice($cartItems)
    {
        return $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });
    }

    protected function prepareOrderData($data, $totalPrice)
    {
        $userId = Auth::id();
        return [
            'number' => $userId . time(),
            'user_id' => $userId,
            'user_address' => $data['user_address'],
            'total' => $totalPrice
        ];
    }

    protected function createOrder($orderData)
    {
        return Order::create($orderData);
    }

    protected function attachOrderItems($order, $cartItems)
    {
        $order->order_items()->createMany(
            $cartItems->map(function ($cartItem) {
                return [
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price * $cartItem->quantity
                ];
            })->toArray()
        );
    }
}
