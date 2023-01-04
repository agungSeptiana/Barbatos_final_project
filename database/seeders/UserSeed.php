<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username'           => 'admin',
                'email'          => 'admin@example.com',
                'password'       => bcrypt('123'),
                'remember_token' => null,
            ],

            [
                'username'           => 'agung',
                'email'          => 'agungseptiana02@gmail.com',
                'password'       => bcrypt('123'),
                'remember_token' => null,
            ],
            [

                'username'           => 'Zean',
                'email'          => 'zean@example.com',
                'password'       => bcrypt('12345'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
