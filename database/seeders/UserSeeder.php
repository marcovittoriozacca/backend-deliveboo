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
            [
                "name" => "Marco",
                "surname" => "Rossi",
                "email" => "marco.rossi@gmail.com"
            ],
            [
                "name" => "Anna",
                "surname" => "Bianchi",
                "email" => "anna.bianchi@gmail.com"
            ],
            [
                "name" => "Luca",
                "surname" => "Rizzo",
                "email" => "luca.rizzo@gmail.com"
            ],
            [
                "name" => "Giulia",
                "surname" => "Conti",
                "email" => "giulia.conti@gmail.com"
            ],
            [
                "name" => "Andrea",
                "surname" => "Gallo",
                "email" => "andrea.gallo@gmail.com"
            ],
            [
                "name" => "Sara",
                "surname" => "Ferrari",
                "email" => "sara.ferrari@gmail.com"
            ],
            [
                "name" => "Paolo",
                "surname" => "Moretti",
                "email" => "paolo.moretti@gmail.com"
            ],
            [
                "name" => "Valentina",
                "surname" => "Ricci",
                "email" => "valentina.ricci@gmail.com"
            ],
            [
                "name" => "Davide",
                "surname" => "Barbieri",
                "email" => "davide.barbieri@gmail.com"
            ],
            [
                "name" => "Chiara",
                "surname" => "Galli",
                "email" => "chiara.galli@gmail.com"
            ]
        ];
        
        foreach ($users as $user) { 
            User::create([
                'name' => $user['name'],
                'surname' => $user['surname'],
                'email' => $user['email'],
                'password' => Hash::make('Password123@'),
            ]);
        }
    }
}
