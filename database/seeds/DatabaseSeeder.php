<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'first_name' => 'Housseman',
            'last_name' => 'Mougamadou',
            'email' => 'mougamadou@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        User::firstOrCreate([
            'first_name' => 'Frédéric',
            'last_name' => 'Amary',
            'email' => 'darkfred78@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
