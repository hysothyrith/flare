<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Property;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $properties = Course::query();

        if ($request->query('enrolled') != null) {
            $enrolledCourseIds = UserCourse::where('user_id', $request->user()['id'])->get('course_id');
            if ($request->query('enrolled')) {
                $properties->whereIn('id', $enrolledCourseIds);
            } else {
                $properties->whereNotIn('id', $enrolledCourseIds);
            }
        }

        return $properties->get();
    }

    public function show($id)
    {
        return new CourseResource(Course::find($id));
    }
}
