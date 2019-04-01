<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'id'=> '1',
            'name' => 'Sondos ',
            'address' =>'Gaza/alNaser Street',
            'phone' => '0599831456',
            'email' => 'sondos@gmail.com',
            'password' => '123456'
        ]);

        DB::table('customers')->insert([
            'id'=> '2',
            'name' => 'Ali ',
            'address' =>'Gaza/alquds Street',
            'phone' => '0599791456',
            'email' => 'Ali@gmail.com',
            'password' => '123456'
        ]);
    }
}

