<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            'id' => '1 ',
            'customer_id' => '1',
            'item_id' => '2',
            'quantity' =>'2'
        ]);

        DB::table('carts')->insert([
            'id' => '2 ',
            'customer_id' => '1',
            'item_id' => '1',
            'quantity' =>'1'
        ]);

        DB::table('carts')->insert([
            'id' => '3 ',
            'customer_id' => '2',
            'item_id' => '1',
            'quantity' =>'4'
        ]);
    }
}
