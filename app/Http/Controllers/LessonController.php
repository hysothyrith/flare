<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use App\Models\Note;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($id)
    {
        return Lesson::find($id);
    }
}
