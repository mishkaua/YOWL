<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => '1', 'title' => 'Events'],
            ['id' => '4', 'title' => 'Sports'],
            ['id' => '29', 'title' => 'Fun'],
            ['id' => '8', 'title' => 'Art'],
            ['id' => '9', 'title' => 'Fashion'],
            ['id' => '10', 'title' => 'Food & Drink'],
            ['id' => '14', 'title' => 'Movies'],
            ['id' => '21', 'title' => 'Travel'],
            ['id' => '25', 'title' => 'Animals and Pets'],
        ]);

        DB::table('categories')->insert([
            ['id' => '2', 'title' => 'Christmas markets', 'parent_cat_id' => '1'],
            ['id' => '3', 'title' => 'Salon de chocolat', 'parent_cat_id' => '1'],
            ['id' => '5', 'title' => 'Euro 2024', 'parent_cat_id' => '4'],
            ['id' => '6', 'title' => 'Olympic Games', 'parent_cat_id' => '4'],
            ['id' => '7', 'title' => 'eSports', 'parent_cat_id' => '4'],
            ['id' => '11', 'title' => 'Restaurants', 'parent_cat_id' => '10'],
            ['id' => '12', 'title' => 'Bars', 'parent_cat_id' => '10'],
            ['id' => '13', 'title' => 'Recipes', 'parent_cat_id' => '10'],
            ['id' => '15', 'title' => 'Horror movies', 'parent_cat_id' => '14'],
            ['id' => '16', 'title' => 'Comedies', 'parent_cat_id' => '14'],
            ['id' => '17', 'title' => 'Thrillers', 'parent_cat_id' => '14'],
            ['id' => '18', 'title' => 'Napoleon', 'parent_cat_id' => '14'],
            ['id' => '19', 'title' => 'Les Inséparables', 'parent_cat_id' => '14'],
            ['id' => '20', 'title' => 'Les Trois Mousquetaires', 'parent_cat_id' => '14'],
            ['id' => '22', 'title' => 'La plus belle France', 'parent_cat_id' => '21'],
            ['id' => '23', 'title' => 'Bella Italia', 'parent_cat_id' => '21'],
            ['id' => '24', 'title' => 'Lapland', 'parent_cat_id' => '21'],
            ['id' => '26', 'title' => 'Cats', 'parent_cat_id' => '25'],
            ['id' => '27', 'title' => 'Dogs', 'parent_cat_id' => '25'],
            ['id' => '28', 'title' => 'Rabbits', 'parent_cat_id' => '25'],
                ]);
    }
}
