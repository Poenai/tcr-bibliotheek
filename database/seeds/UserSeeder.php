<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jan Schuit',
            'email' => 'j.schuit@tcrmbo.nl',
            'password' => Hash::make('admin'),
            'isAdmin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'testuser',
            'email' => 'test@tcrmbo.nl',
            'password' => Hash::make('123'),
            'isAdmin' => false,
        ]);
        factory(App\User::class, 30)->create();
    }
}
