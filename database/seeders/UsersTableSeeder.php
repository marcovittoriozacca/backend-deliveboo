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
        User::create([
            'name' => 'NomeUtente',
            'surname' => 'CognomeUtente',
            'email' => 'utente@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
