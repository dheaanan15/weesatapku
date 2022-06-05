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
    }
}
