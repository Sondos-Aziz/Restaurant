<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'id'=> '10',
            'title' => 'Restaurent WebSite ',
            'sub_title' =>'Welcome in our WebSite',
            'image' => '/restaurent.jpg'
        ]);
    }
}
