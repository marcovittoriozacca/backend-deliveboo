<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            User::create([
                'name' => fake()->firstName(),
                'surname' => fake()->lastName(),
                'email' => fake()->unique()->email(),
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
