<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('qwerty@admin.in'),
            'email' => 'prkjha25@gmail.com',
            'admin' => 1,
            'avatar' => 'avatars/avatar.png'
        ]);
        App\User::create([
            'name' => 'Emily Myers',
            'password' => bcrypt('password'),
            'email' => 'emily@myers.com',
            'avatar' => 'avatars/avatar.png'
        ]);
    }
}
