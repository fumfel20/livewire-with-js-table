<?php

namespace Database\Seeders;

use Database\Factories\OrderProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 150000;
        $chunkSize = 5000;
        $this->command->getOutput()->progressStart($total);
        $factory = new OrderProductFactory();

        for ($i = 0; $i < $total; $i += $chunkSize) {
            $data = [];

            for ($j = 0; $j < $chunkSize; $j++) {
                $data[] = $factory->definition();
            }

            // Używamy DB::table, bo to najszybsza metoda dla tabel pivot
            DB::table('orders_products')->insert($data);
            $this->command->getOutput()->progressAdvance($chunkSize);
        }
        $this->command->getOutput()->progressFinish();
    }
}
