<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\Restaurant;

use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {

            Order::truncate();

        });



        for ($i=0; $i < 50; $i++) { 

            $randomRestaurant = Restaurant::inRandomOrder()->first();

            Order::create([

                'restaurant_id' => $randomRestaurant->id,

                'name' =>  fake()->firstName(),

                'last_name' =>  fake()->lastName(),
                
                'address' =>  fake()->address(),
                
                'phone_number' =>  fake()->e164PhoneNumber(),

                'email' =>  fake()->email(),

                'date' => fake()->dateTimeBetween('-1 year'),

                'time' => fake()->time(),

                'total_price' => 0,
                
            ]);
            
        }

    }

}
