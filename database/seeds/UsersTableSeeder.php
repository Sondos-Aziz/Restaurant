<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();
       $adminRole =  Role::where('name' , 'admin')->first();
        $userRole =  Role::where('name' , 'user')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('admin'),
           'image' => '1559226071.jpg'
        ]);

        $user = User::create([
            'name' => 'User1',
            'email' => 'user123@gmail.com',
            'password' => bcrypt('user1'),
            'image' => '1559226071.jpg'
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);

    }
}
