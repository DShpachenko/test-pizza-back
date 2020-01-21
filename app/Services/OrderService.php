<?php

namespace App\Services;

use App\Models\Products;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderService extends Service
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param UserRepository $userRepository
     */
    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository)
    {
        $this->repository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param $data
     */
    public function save($data): void
    {
        $products = $this->getProducts($data['store']);
        $cost = $this->calculateCost($products);

        if (!$client = $this->userRepository->findBy('phone', $data['client']['phone'])) {
            $client = $this->userRepository->create($data['client']);
        }

        $order = $client->orders()->create([
            'total_sum_eur' => $cost['total_sum_eur'],
            'total_sum_usd' => $cost['total_sum_usd'],
            'address' => $data['client']['address']
        ]);

        foreach ($products as $item) {
            $order->products()->attach($item['product']->id, ['count' => $item['count']]);
        }
    }

    /**
     * @param $phone
     * @return mixed
     * @throws \Exception
     */
    public function history($phone)
    {
        $user = $this->userRepository->findBy('phone', $phone);

        return $user->orders ?? null;
    }

    /**
     * @param $products
     * @return array
     */
    private function calculateCost($products): array
    {
        $cost = [
            'total_sum_eur' => 0,
            'total_sum_usd' => 0,
        ];

        foreach ($products as $item) {
            $cost['total_sum_eur'] += $item['product']->cost_eur * $item['count'];
            $cost['total_sum_usd'] += $item['product']->cost_usd * $item['count'];
        }

        return $cost;
    }

    /**
     * @param $store
     * @return array
     */
    private function getProducts($store): array
    {
        $products = [];

        foreach ($store as $key => $value) {
            if ($value) {
                $products[] = [
                    'product' => Products::find($key),
                    'count' => $value
                ];
            }
        }

        return $products;
    }
}
