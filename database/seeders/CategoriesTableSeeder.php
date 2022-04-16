<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $categories = [
            [
                'name' => 'Motoryzacja',
            ],
            [
                'name' => 'Sport',
            ],
            [
                'name' => 'Biznes',
            ],
            [
                'name' => 'Gwiazdy',
            ],
            [
                'name' => 'Porady konsumenckie',
            ],
            [
                'name' => 'Styl życia',
            ],
            [
                'name' => 'Turystyka',
            ],
            [
                'name' => 'Gry online',
            ],
        ];

        foreach ($categories as $category){
            DB::table('categories')->insert([
                'name' => $category['name'],
                'created_at' => $faker->dateTime,
            ]);
        }
    }
}
