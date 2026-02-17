<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = json_decode(json_encode($this->seeds()), FALSE);

        foreach ($seeds as $seed){
            ProductType::query()->insertOrIgnore([
                'id' => $seed->id,
                'type_name' => $seed->type_name,
            ]);

        }
    }

    public function seeds()
    {
        return[
            [
                'id' => 1,
                'type_name' => 'Type 1',
            ],
            [
                'id' => 2,
                'type_name' => 'Type 2',
            ],

        ];
    }
}
