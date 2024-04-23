<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('restaurant_type')->truncate();

        // Popola la tabella pivot con dati casuali
        $iterations = 0;

        while ($iterations < 20){
            $restaurant = Restaurant::inRandomOrder()->first()->id;
            $type = Type::inRandomOrder()->first()->id;
    
            if( !DB::table('restaurant_type')->where('restaurant_id', $restaurant)->where('type_id', $type)->exists() ){
                $iterations++;
                DB::table('restaurant_type')->insert([
                    'restaurant_id' => $restaurant,
                    'type_id' => $type,
                ]);
            }
        }
    }
}
