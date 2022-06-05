<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ikhwanul Akhmad DLY',
            'email' => 'ikhwan@weesata.com',
            'isAdmin' => true,
            'password' => bcrypt('ikhwan'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@weesata.com',
            'isAdmin' => false,
            'password' => bcrypt('johndoe'),
        ]);

        User::create([
            'name' => 'Dhea Ananda',
            'email' => 'dheaanan15@gmail.com',
            'isAdmin' => true,
            'password' => bcrypt('dhea'),
        ]);
        User::create([
            'name' => 'Fikri Haikal',
            'email' => 'fikrihaikal261202.com',
            'isAdmin' => true,
            'password' => bcrypt('fikri'),
        ]);
        User::create([
            'name' => 'Delvi Hastari',
            'email' => 'delvihastari@gmail.com',
            'isAdmin' => true,
            'password' => bcrypt('delvi'),
        ]);
        User::create([
            'name' => 'Suri Wulandari',
            'email' => 'suriwulandari@gmail.com',
            'isAdmin' => true,
            'password' => bcrypt('suri'),
        ]);
        User::create([
            'name' => 'Delvi Nur Aini',
            'email' => 'delvinuraini@gmail.com',
            'isAdmin' => true,
            'password' => bcrypt('delvi'),
        ]);

    }
}
