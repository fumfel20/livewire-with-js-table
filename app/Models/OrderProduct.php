<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class OrderProduct extends Model
{
    protected $table = 'orders_products';

    public function orders()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * @return HasOneThrough
     * select * from orders_products op
     * inner join orders o on op.order_id = o.id
     * inner join order_statuses us on o.status_id = us.id
     *
     * The order of keys in hasOneThrough can be tricky. Here is how they map to your specific schema:
     * OrderStatus::class: The final model you want to access.
     * Order::class: The middle model that connects the two.
     * id (Order): The key in the orders table that matches order_id in orders_products.
     * id (OrderStatus): The key in the order_statuses table that matches status_id in orders.
     * order_id (OrderProduct): The local column in your current table.
     * status_id (Order): The column in the intermediate orders table that points to the status.
     */
    public function order_status()
    {
        return $this->hasOneThrough(
            OrderStatus::class, // Target Model
            Order::class,       // Intermediate Model
            'id',               // Foreign key on orders table (Order.id)
            'id',               // Foreign key on order_statuses table (OrderStatus.id)
            'order_id',         // Local key on orders_products table
            'status_id'         // Local key on orders table
        );
    }
}
