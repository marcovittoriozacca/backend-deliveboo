<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'name' => 'NomeRistorante',
            'slug' => 'slug-ristorante',
            'address' => 'Indirizzo del ristorante',
            'piva' => '01234567890',
            'user_id' => 1, // Sostituisci con l'ID dell'utente proprietario del ristorante
        ]);
    }
}
