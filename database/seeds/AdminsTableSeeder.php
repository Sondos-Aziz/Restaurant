<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'=> '1',
            'name' => 'Admin ',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'image' => '1559226071.jpg'
        ]);

    }
}
