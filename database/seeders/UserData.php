<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{

    public function run()
    {
        $user = [[
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'level' => 1,
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Yayasan',
            'username' => 'yayasan',
            'password' => bcrypt('123456'),
            'level' => 2,
            'email' => 'yayasan@gmail.com'
        ]];

        foreach ($user as $value) {
            User::create($value);
        }
    }
}
