<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title' => 'Date Manipulation',
                'author_id' => 1,
                'category_id' => 4,
                'description' => 'This is the perfect place to start your journey as a front-end developer.',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Calendar.png'
            ],
            [
                'title' => 'OOP',
                'author_id' => 2,
                'category_id' => 5,
                'description' => 'Get your hands dirty writing and styling website front-ends using HTML and CSS',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Car.png'
            ],
            [
                'title' => 'Online Payment',
                'author_id' => 3,
                'category_id' => 1,
                'description' => 'Make your site interactive using JavaScript',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Cards.png'
            ],
            [
                'title' => 'Cloud Technology',
                'author_id' => 4,
                'category_id' => 8,
                'description' => 'Build real-world projects including an image carousel and an infinitely scrolling list',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Cloud.png'
            ],
            [
                'title' => 'Architecture',
                'author_id' => 5,
                'category_id' => 2,
                'description' => 'Go beyond the basics: get introduced to TypeScript and React',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Error.png'
            ],
            [
                'title' => 'Cybersecurity',
                'author_id' => 6,
                'category_id' => 3,
                'description' => 'Learn all the React fundamentals you need to know to get you above the ground',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Cross.png'
            ],
            [
                'title' => 'Data Visualization',
                'author_id' => 7,
                'category_id' => 4,
                'description' => 'Get your hands dirty writing and running real React code',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Diagram.png'
            ],
            [
                'title' => 'Compression',
                'author_id' => 8,
                'category_id' => 6,
                'description' => 'Learn to integrate your React frontend with a Firebase backend',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/EmptyBOX.png'
            ],
            [
                'title' => 'File Storage',
                'author_id' => 9,
                'category_id' => 7,
                'description' => 'See how React pairs with Typescript to make more possible',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/EmptyFiles.png'
            ],
            [
                'title' => 'Time Sharing',
                'author_id' => 1,
                'category_id' => 9,
                'description' => 'Use React Tracked to develop a small web app with global state',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Clock.png'
            ],
            [
                'title' => 'Authentication',
                'author_id' => 2,
                'category_id' => 1,
                'description' => 'Brush up on data structures, algorithms, and important syntax',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Forbidden.png'
            ],
            [
                'title' => 'Scaling',
                'author_id' => 3,
                'category_id' => 2,
                'description' => 'Learn the patterns that will help you answer any question you might face',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Lockopen.png'
            ],
            [
                'title' => 'Memory',
                'author_id' => 4,
                'category_id' => 5,
                'description' => 'Practice answering hundreds of real interview questions',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Message.png'
            ],
            [
                'title' => 'Docker',
                'author_id' => 5,
                'category_id' => 8,
                'description' => 'Practice analysis of problems and application of object oriented design principles',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Failure.png'
            ],
            [
                'title' => 'Writing Tests',
                'author_id' => 6,
                'category_id' => 9,
                'description' => 'Practice designing realistic large-scale systems',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Tick.png'
            ],
            [
                'title' => 'Celebrate',
                'author_id' => 7,
                'category_id' => 1,
                'description' => 'Master the art of implementing microservices across a range of different tech stack',
                'cover_image' => 'https://u.cubeupload.com/rachnakeo/Succes.png'
            ],
        ];

        DB::table('courses')->insert($courses);
    }
}
