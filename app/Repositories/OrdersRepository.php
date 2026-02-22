<?php

namespace App\Repositories;

use App\Models\OrderProduct;

class OrdersRepository
{
    public function orders(string $delivery_date, string $status_name)
    {
        return OrderProduct::query()
            ->with('products')
            ->with('orders')
            ->with('order_status')
            ->whereHas('orders', function ($query) use ($delivery_date) {
                $query->where('delivery_date', $delivery_date);
            })
            ->whereHas('order_status', function ($query) use ($status_name) {
                $query->where('status_name', $status_name);
            })
            ->get();
    }
}
