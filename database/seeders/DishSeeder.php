<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Faker $faker): void
    {
        $dishes = [
            // Antipasti
            [
                'category_id' => 1,
                'name' => 'Tom Yum Goong',
                'description' => 'Zuppa piccante di gamberi con limone, erbe aromatiche e peperoncino.',
                'ingredient' => 'Gamberi, limone, erbe aromatiche, peperoncino',
                'image' => null,
                'price' => 10.00
            ],
            [
                'category_id' => 1,
                'name' => 'Som Tam',
                'description' => 'Insalata di papaya verde con pomodori ciliegia, fagiolini, arachidi e salsa di lime e peperoncino.',
                'ingredient' => 'Papaya verde, pomodori ciliegia, fagiolini, arachidi, salsa di lime e peperoncino',
                'image' => null,
                'price' => 8.00
            ],
            // Piatti principali
            [
                'category_id' => 2,
                'name' => 'Pad Thai',
                'description' => 'Noodles di riso saltati in padella con gamberi, tofu, uova, germogli di soia e arachidi.',
                'ingredient' => 'Noodles di riso, gamberi, tofu, uova, germogli di soia, arachidi',
                'image' => null,
                'price' => 15.00
            ],
            [
                'category_id' => 2,
                'name' => 'Massaman Curry di Manzo',
                'description' => 'Curry di manzo con patate, cipolle, arachidi, cannella e spezie aromatiche.',
                'ingredient' => 'Manzo, patate, cipolle, arachidi, cannella, spezie',
                'image' => null,
                'price' => 18.00
            ],
            // Dessert
            [
                'category_id' => 3,
                'name' => 'Mango Sticky Rice',
                'description' => 'Riso glutinoso cotto al vapore servito con fette di mango fresco e salsa di cocco dolce.',
                'ingredient' => 'Riso glutinoso, mango, salsa di cocco',
                'image' => null,
                'price' => 9.00
            ],
            [
                'category_id' => 3,
                'name' => 'Khanom Buang',
                'description' => 'Crepes croccanti farcite con crema di cocco e crema di fagioli mung.',
                'ingredient' => 'Farina di riso, crema di cocco, fagioli mung',
                'image' => null,
                'price' => 7.00
            ],
            // Bevande
            [
                'category_id' => 4,
                'name' => 'Thai Iced Tea',
                'description' => 'Tè nero freddo dolce e cremoso, servito con latte condensato e ghiaccio.',
                'ingredient' => 'Tè nero, latte condensato, ghiaccio',
                'image' => null,
                'price' => 6.00
            ],
            [
                'category_id' => 4,
                'name' => 'Singha Beer',
                'description' => 'Birra thailandese chiara e rinfrescante, perfetta per accompagnare i piatti piccanti.',
                'ingredient' => 'Acqua, malto, luppolo',
                'image' => null,
                'price' => 5.00
            ]
        ];
        
        
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));

        foreach ($dishes as $key => $plate) {
            $dish = new Dish();
            $dish->category_id = $plate['category_id'];
            $dish->name = $plate['name'];
            $dish->slug = Str::slug($plate['name'], '-');
            $dish->description = $plate['description'];
            $dish->ingredient = $plate['ingredient'];
            $dish->image = null;
            $dish->price = $plate['price'];
            $dish->visible = 1;
            $dish->restaurant_id = 18;
            $dish->save();
        }
    }
}
