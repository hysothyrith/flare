<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            ['first_name' => 'James', 'last_name' => 'Bond'],
            ['first_name' => 'Pierce', 'last_name' => 'Hawthorne'],
            ['first_name' => 'Annie', 'last_name' => 'Edison'],
            ['first_name' => 'Abed', 'last_name' => 'Nadir'],
            ['first_name' => 'Britta', 'last_name' => 'Perry'],
            ['first_name' => 'Troy', 'last_name' => 'Barnes'],
            ['first_name' => 'Shirley', 'last_name' => 'Bennet'],
            ['first_name' => 'Jeff', 'last_name' => 'Winger'],
            ['first_name' => 'Ben', 'last_name' => 'Chang'],
        ];

        DB::table('authors')->insert($authors);
    }
}
