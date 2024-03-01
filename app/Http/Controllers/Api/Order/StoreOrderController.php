<?php

namespace App\Http\Controllers\Api\Order;

use App\Events\NewOrderNotification;
use App\Http\Controllers\Base\ApiController;
use App\Http\Requests\Api\Order\StoreRequest;

use App\Repositories\OrderRepository;


class StoreOrderController extends ApiController
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $order= $this->orderRepository->store($data);
        if (!$order){
           return $this->getResponse(404,'No element in cart ');
        }
       event( new NewOrderNotification($order));
        return $this->getResponse(200 ,'Order created successfully',['order'=>$order]);
    }
}
