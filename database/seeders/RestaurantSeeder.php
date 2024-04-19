<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            $name = fake()->unique()->name();
            Restaurant::create([
                'name' => $name,
                'slug' => Str::slug($name, '-'),
                'address' => fake()->address(),
                'piva' =>  fake()->unique()->randomNumber(),
                'user_id' => $i,
            ]);
        }
    }
}
