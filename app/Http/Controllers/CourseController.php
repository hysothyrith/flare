<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::query();

        if ($request->query('enrolled') != null) {
            $enrolledCourseIds = UserCourse::where('user_id', $request->user()['id'])->get('course_id');
            if ($request->query('enrolled')) {
                $courses->whereIn('id', $enrolledCourseIds);
            } else {
                $courses->whereNotIn('id', $enrolledCourseIds);
            }
        }

        if ($request->query('limit')) {
            $courses->limit($request->query('limit'));
        }

        return new CourseCollection($courses->get());
    }

    public function show($id)
    {
        return new CourseResource(Course::find($id));
    }
}
