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
        for ($i=0; $i<10; $i++){
            $dish= new Dish();
            $dish->name = $faker->randomElement(['pasta', 'pizza', 'carne', 'topo']);
            $dish->slug = Str::slug($dish->name, '-');
            $dish->description = $faker->text(10);
            $dish->ingredient = $faker->text(10);
            $dish->image = $faker->url('http');
            $dish->price = $faker->randomFloat(2, 1, 99);
            $dish->visible = $faker->boolean();
            $dish->category_id = $faker->numberBetween(1, 4);
            $dish->save();
        }
    }
}
