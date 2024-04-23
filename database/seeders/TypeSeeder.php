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
            [
                "type" => "Italiano",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Italiano.webp"
            ],
            [
                "type" => "Fusion",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Fusion.webp"
            ],
            [
                "type" => "Francese",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Francese.webp"
            ],
            [
                "type" => "Indiano",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Indiano.webp"
            ],
            [
                "type" => "Messicano",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Messicano.webp"
            ],
            [
                "type" => "Giapponese",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Giapponese.webp"
            ],
            [
                "type" => "Cinese",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Cinese.webp"
            ],
            [
                "type" => "Greco",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Greco.webp"
            ],
            [
                "type" => "Thai",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Thai.webp"
            ],
            [
                "type" => "Brasiliano",
                "image" => "http://127.0.0.1:8000/storage/restaurant_typologies/Brasiliano.webp"
            ],
        ];

        foreach ($tipologie as $tipologia) {
            Type::create([
                'name' => $tipologia['type'],
                'slug' => Str::slug($tipologia['type'], '-'),
                'image' => $tipologia['image'],
            ]);
        }
    }
}
