<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::insert([
            [
                'name'      => 'Андрей',
                'email'     => 'admin@mail.ru',
                'password'  => Hash::make('21212121')
            ],
            [
                'name'      => 'Виктор',
                'email'     => 'user@mail.ru',
                'password'  => Hash::make('21212121')
            ]
        ]);
    }
}
