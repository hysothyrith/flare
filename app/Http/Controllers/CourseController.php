<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index() {
        return new CourseCollection(Course::all());
    }

    public function show($id)
    {
        return new CourseResource(Course::where('id', $id)->first());
    }
}
