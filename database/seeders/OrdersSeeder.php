<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 50000;
        $chunkSize = 5000;

        $this->command->getOutput()->progressStart($total);

        for ($i = 0; $i < $total; $i += $chunkSize) {
            $data = Order::factory()
                ->count($chunkSize)
                ->make()
                ->toArray();

            Order::insert($data);

            $this->command->getOutput()->progressAdvance($chunkSize);
        }

        $this->command->getOutput()->progressFinish();
    }
}
