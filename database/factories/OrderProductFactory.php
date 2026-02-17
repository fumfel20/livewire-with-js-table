<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->numberBetween(10000000, 10049999),
            'product_id' => $this->faker->numberBetween(1, 10000),
            // 'created_at' => now(), // odkomentuj jeśli tabela ma timestampy
            // 'updated_at' => now(),
        ];
    }
}
