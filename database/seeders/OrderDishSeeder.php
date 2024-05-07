<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Dish;
use Faker\Generator as Faker;
class OrderDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        DB::table('dish_order')->truncate();


        // Popola la tabella pivot con dati casuali
        $iterations = 0;

        while ($iterations < 40){
            $order = Order::inRandomOrder()->first()->id;
            $dish = Dish::where('restaurant_id', 11)->inRandomOrder()->first();

            if( !DB::table('dish_order')->where('dish_id', $dish->id)->where('order_id', $order)->exists() ){
                $iterations++;

                DB::table('dish_order')->insert([
                    'dish_id' => $dish->id,
                    'order_id' => $order,
                    'name' => $dish->name,
                    'quantity' => $faker->numberBetween(1,4),
                    'price' => $dish->price,
                ]);
            }
        }



    }
}
