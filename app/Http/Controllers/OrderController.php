<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderHistoryRequest;
use App\Http\Resources\OrdersCollection;
use App\Http\Resources\StoreResponse;
use App\Services\OrderService;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param OrderHistoryRequest $request
     * @return OrdersCollection
     * @throws \Exception
     */
    public function history(OrderHistoryRequest $request)
    {
        $orders = $this->orderService->history($request->get('phone'));

        return new OrdersCollection($orders);
    }

    /**
     * @param OrderStoreRequest $request
     * @return StoreResponse
     */
    public function store(OrderStoreRequest $request)
    {
        $this->orderService->save($request->all());

        return new StoreResponse('OK');
    }
}
