<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ReservationsSeeder::class);
      //for admin
        DB::table('users')->insert([
            'name' => "admin",
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('sash4')
        ]);


    }
}
