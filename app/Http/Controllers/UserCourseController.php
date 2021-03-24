<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseCollection;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::where('id', $request->user()['id'])->firstOrFail();
            return new CourseCollection($user->courses);
        } catch (QueryException $e) {
            return response() . json('error', $e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);
        try {
            $userCourse = new UserCourse;
            $userCourse->user_id = $request->user()['id'];
            $userCourse->course_id = $request->course_id;
            $userCourse->save();

            return response()->json(['success' => 'Enrolled'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($courseId, Request $request)
    {
        try {
            $userCourse = UserCourse::where('course_id', $courseId)->where('user_id', $request->user()['id'])->firstOrFail();
            $userCourse->delete();

            return response()->json(['success' => 'Unenrolled']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Course not enrolled'], 400);
        }
    }
}
