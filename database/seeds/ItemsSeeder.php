<?php

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'pizza',
            'description' => 'pizza-vegetarian' ,
            'price' => '100' ,
            'image' => '/37876866-pizza-vegetarian-on-plate.jpg' ,
            'category_id' => '1'
        ]);

        DB::table('items')->insert([
            'name' => ' fresh-greek',
            'description' => 'salad ' ,
            'price' => '20' ,
            'image' => '/40944255-fresh-greek-salad-on-a-plate.jpg' ,
            'category_id' => '2'
        ]);

        DB::table('items')->insert([
            'name' => 'traditional-italian ',
            'description' => 'sandwich-with-ham-and-cheese-served-warm' ,
            'price' => '200' ,
            'image' => '/61044823-traditional-italian-sandwich-with-ham-and-cheese-served-warm-.jpg' ,
            'category_id' => '3'
        ]);
    }
}





