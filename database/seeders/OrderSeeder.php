<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i<50; $i++){
            $order= new Order();
            $order->full_name = $faker->firstName().' '.$faker->lastName();
            $order->email = $faker->email();
            $order->address = $faker->address();
            $order->tel_number = $faker->phoneNumber();
            $order->description = $faker->text(15);
            $order->date = $faker->dateTimeBetween('-2 year', 'now')->format('Y-m-d H:i:s');
            $order->status = $faker->boolean(100);
            $order->total_price = $faker->randomFloat(2, 1, 99);
            $order->restaurant_id = 11;
            $order->save();
        }
    }
}
