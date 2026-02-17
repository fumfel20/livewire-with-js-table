<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = json_decode(json_encode($this->seeds()), FALSE);

        foreach ($seeds as $seed){
            OrderStatus::query()->insertOrIgnore([
                'id' => $seed->id,
                'status_name' => $seed->status_name,
            ]);

        }

    }
    public function seeds()
    {
        return[
            [
                'id' => 1,
                'status_name' => 'Active',
            ],
            [
                'id' => 2,
                'status_name' => 'Inactive',
            ],

        ];
    }
}
