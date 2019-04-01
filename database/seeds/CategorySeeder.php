<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categories')->insert([
            'name' => 'Pizza ',
            'description' => 'Type of Pizza'
        ]);

        DB::table('Categories')->insert([
            'name' => 'Salad ',
            'description' => 'Type of Salad'
        ]);

        DB::table('Categories')->insert([
            'name' => 'Meet',
            'description' => 'Type of Meet'
        ]);

    }
}
