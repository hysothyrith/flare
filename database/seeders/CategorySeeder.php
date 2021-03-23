<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            ['name' => 'React'],
            ['name' => 'Vue'],
            ['name' => 'Cybersecurity'],
            ['name' => 'Data Science'],
            ['name' => 'Algorithms'],
            ['name' => 'iOS'],
            ['name' => 'Android'],
            ['name' => 'Robotics'],
            ['name' => 'Linguistics'],
        ];

        DB::table('categories')->insert($categories);
    }
}
