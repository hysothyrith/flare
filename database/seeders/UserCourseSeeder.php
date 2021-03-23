<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_courses = [
            ['user_id' => '1', 'course_id' => '1'],
            ['user_id' => '1', 'course_id' => '2'],
        ];

        DB::table('user_courses')->insert($user_courses);
    }
}
