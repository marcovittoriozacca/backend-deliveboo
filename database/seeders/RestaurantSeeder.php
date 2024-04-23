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
        $restaurants = [
            [
                "activity_name" => 'Trattoria Bella Napoli',
                "address" => 'Via Roma, 12',
                
            ],
            [
                "activity_name" => 'Ristorante Gusto Divino',
                "address" => 'Via Garibaldi, 8',
                
            ],
            [
                "activity_name" => 'Osteria del Borgo',
                "address" => 'Piazza Municipio',
                
            ],
            [
                "activity_name" => 'Trattoria Buon Appetito',
                "address" => 'Corso Vittorio Emanuele',
                
            ],
            [
                "activity_name" => 'Ristorante La Pergola',
                "address" => 'Lungarno Pacinotti, 15',
                
            ],
            [
                "activity_name" => 'Osteria La Vecchia Venezia',
                "address" => 'Campo Santa Margherita',
                
            ],
            [
                "activity_name" => 'Trattoria Del Sol',
                "address" => 'Via Montegrappa, 33',
                
            ],
            [
                "activity_name" => 'Ristorante Buon Gusto',
                "address" => 'Via Roma, 55',
                
            ],
            [
                "activity_name" => 'Osteria La Saporita',
                "address" => 'Piazza della Repubblica, 22',
                
            ],
            [
                "activity_name" => 'Trattoria Al Mare',
                "address" => 'Viale della Libertà, 10',
                
            ],
        ];
        


        foreach ($restaurants as $key=>$restaurant) { 
            
            Restaurant::create([
                'activity_name' => $restaurant['activity_name'],
                'slug' => Str::slug($restaurant['activity_name'], '-'),
                'address' => $restaurant['address'],
                'piva' =>  fake()->unique()->numberBetween(10000000000, 99999999999),
                'image' => null,
                'user_id' => $key+1,
            ]);
        }

    }
}
