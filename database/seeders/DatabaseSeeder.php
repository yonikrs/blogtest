<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $sites = [
            [
                'name' => 'Site1'
            ],
            [
                'name' => 'Site2'
            ],
            [
                'name' => 'Site3'
            ],
            [
                'name' => 'Site4'
            ],
            [
                'name' => 'Site5'
            ]
        ];

        Site::insert($sites);

        $users = [
            [
                'name' => 'user1',
                'email' => 'yonikrs216@gmail.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'user2',
                'email' => 'robbie19990827@gmail.com',
                'password' => bcrypt('123456')
            ]
        ];

        User::insert($users);
    }
}
