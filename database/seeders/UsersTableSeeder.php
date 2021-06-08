<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Dummy 1',
            'email' => 'd@g.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'sa@g.com',
            'password' => bcrypt('%c[6,fU%S[s]y2r>'),
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'a@g.com',
            'password' => bcrypt('%c[6,fU%S[s]y2r>'),
        ]);
        User::create([
            'name' => 'General User App',
            'email' => 'general_user@gmail.com',
            'password' => bcrypt('123456Asdf'),
            'is_app' => 1,
        ]);
        User::create([
            'name' => 'Tanjemul',
            'email' => 'tanjemul.twinbit@gmail.com',
            'password' => bcrypt('5c[6fU%S]2r>ger'),
        ]);
        User::create([
            'name' => 'Sakib',
            'email' => 'sakib.twinbit@gmail.com',
            'password' => bcrypt('fg345fU%S]2gerfdh6567'),
        ]);
    }
}
