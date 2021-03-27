<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use App\Models\Note;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'hasNote' => 'required|boolean'
        ]);

        $lessons = Lesson::query();
        if ($request->query('hasNote')) {
            $usersNoteIds = Note::where('user_id', $request->user()['id'])->get('id');

            $lessons->whereIn('id', $usersNoteIds)->with('course');
        } else {
            return response()->json(['error' => 'Route currently only used with hasNote'], 400);
        }

        return LessonResource::collection($lessons->get()) ?? response()->noContent();
    }

    public function show($id)
    {
        return Lesson::find($id);
    }
}
