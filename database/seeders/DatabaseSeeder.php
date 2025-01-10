<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->username = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin123') ;
        $admin->role = 'admin';
        $admin->save();


        $user = new User();
        $user->name = 'Ali';
        $user->username = 'ahmed';
        $user->email = 'ali@gmail.com';
        $user->password = bcrypt('123456789') ;
        $user->role = 'user';
        $user->save();

        $user = new User();
        $user->name = 'Charfeddine';
        $user->username = 'Fredj';
        $user->email = 'charf@gmail.com';
        $user->password = bcrypt('123456789') ;
        $user->role = 'user';
        $user->save();


        // \App\Models\User::factory(10)->create();
    }
}
