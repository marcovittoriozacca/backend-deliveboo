<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));

        for ($i=0; $i<10; $i++){
            $dish= new Dish();
            $dish->category_id = $faker->numberBetween(1, 4);
            $dish->name = $faker->foodName();
            $dish->slug = Str::slug($dish->name, '-');
            $dish->description = $faker->text(25);
            $dish->ingredient = $faker->text(20);

            $dish->image = null;

            $dish->price = $faker->randomFloat(2, 1, 99);
            $dish->visible = 1;
            $dish->restaurant_id = $i + 1;
            $dish->save();
        }
    }
}
