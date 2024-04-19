<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name' => 'Tipo di ristorante',
            'slug' => 'tipo-di-ristorante',
            'image' => 'percorso/dell/immagine.jpg',
        ]);
    }
}
