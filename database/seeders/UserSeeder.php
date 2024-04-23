<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            'giovanni',
            'enzo',
            'masoud',
            'eros',
            'marco'
        ];
        for ($i=0; $i < 5; $i++) { 
            User::create([
                'name' => fake()->firstName(),
                'surname' => fake()->lastName(),
                'email' => $users[$i].'@gmail.com',
                'password' => Hash::make('Password123@'),
            ]);
        }
    }
}
