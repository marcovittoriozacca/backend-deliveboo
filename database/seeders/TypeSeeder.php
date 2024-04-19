<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipologie = [
            "Italiano",
            "Fusion",
            "Messicano",
            "Giapponese",
            "Cinese",
            "Francese",
            "Greco",
            "Thai",
            "Indiano",
            "Brasiliano"
        ];

        foreach ($tipologie as $key => $tipologia) {
            Type::create([
                'name' => $tipologia,
                'slug' => Str::slug($tipologia, '-'),
                'image' => fake()->imageUrl(),
            ]);
        }
    }
}
