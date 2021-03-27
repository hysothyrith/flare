<?php

namespace App\Http\Controllers;

use App\Http\Resources\NoteResource;
use App\Models\Lesson;
use App\Models\Note;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index($lessonId, Request $request)
    {
        try {
            Lesson::findOrFail($lessonId);
            return Note::where('lesson_id', $lessonId)->where('user_id', $request->user()['id'])->first() ?? response()->noContent();
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Invalid lesson'], 400);
        }
    }

    public function store($lessonId, Request $request)
    {
        $request->validate([
            'note_content' => 'required'
        ]);
        try {
            Lesson::findOrFail($lessonId);

            $note = new Note;
            $note->user_id = $request->user()['id'];
            $note->lesson_id = $lessonId;
            $note->content = $request->note_content;
            $note->save();
            return response()->json(['success' => 'Note created'], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Invalid lesson'], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'note_content' => 'required'
        ]);

        try {
            $note = Note::where('id', $id)->where('user_id', $request->user()['id'])->firstOrFail();
            $note->content = $request['note_content'];
            $note->save();

            return response()->json(['success' => 'Note updated']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note not found'], 400);
        }
    }

    public function destroy($id, Request $request)
    {
        try {
            $note = Note::where('id', $id)->where('user_id', $request->user()['id'])->firstOrFail();
            $note->delete();

            return response()->json(['success' => 'Note deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note not found'], 400);
        }
    }
}
