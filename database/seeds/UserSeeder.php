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
        'name' => 'Henk Shipswrak',
        'email' => 'h.schipswrak@tcrmbo.nl',
        'password' => Hash::make('password'),
        'isAdmin' => false,
        ]);
        factory(App\User::class,30)->create();
    }
}
