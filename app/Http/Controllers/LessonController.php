<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show($id) {
        return new LessonResource(Lesson::where('id', $id)->first());
    }
}
