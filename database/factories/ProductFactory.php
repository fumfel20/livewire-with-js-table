<?php

namespace Database\Factories;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_code' => $this->faker->unique()->bothify('PROD-####-??'),
            'product_description' => $this->faker->sentence(3),
            'length' => $this->faker->numberBetween(10, 500),
            'width' => $this->faker->numberBetween(10, 500),
            'height' => $this->faker->numberBetween(10, 500),
            'price' => $this->faker->numberBetween(100, 100000),
            'product_type_id' => ProductType::inRandomOrder()->first()?->id ?? 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
