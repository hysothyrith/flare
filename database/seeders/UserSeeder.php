<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name' => 'Justin Bieber',
                'email' => 'justin@gmail.com',
                'password' => bcrypt('password'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
