<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalRecords = 10000;
        $chunkSize = 1000;

        $this->command->getOutput()->progressStart($totalRecords);

        for ($i = 0; $i < $totalRecords; $i += $chunkSize) {
            $products = Product::factory()
                ->count($chunkSize)
                ->make()
                ->toArray();

            Product::insertOrIgnore($products);

            $this->command->getOutput()->progressAdvance($chunkSize);
        }

        $this->command->getOutput()->progressFinish();
    }
}
