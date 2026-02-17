<?php

namespace Database\Factories;

use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_id' => OrderStatus::inRandomOrder()->first()?->id ?? 1,
            'delivery_date' => $this->faker->dateTimeBetween('2025-01-01', '2026-12-31')->format('Y-m-d'),
        ];
    }
}
