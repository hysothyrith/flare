<?php

namespace App\Http\Controllers;

use App\Http\Resources\NoteResource;
use App\Http\Resources\UserNoteResource;
use App\Models\Lesson;
use App\Models\Note;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $notes = Note::query()->where('user_id', $request->user()['id']);

        if ($request->query('lesson_id')) {
            $notes->where('lesson_id', $request->query('lesson_id'));
            $foundNote = $notes->first();
            return $foundNote ? new NoteResource($foundNote) : response()->noContent();
        }

        return UserNoteResource::collection($notes->get());
    }

    public function show($id, Request $request)
    {
        try {
            $note = Note::findOrFail($id);
            if ($note->user->id != $request->user()['id']) {
                return response()->json(['error' => 'Note does not belong to user'], 401);
            }
            return new NoteResource($note);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note does not exist'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'note_content' => 'required'
        ]);

        $existingNote = Note::where('lesson_id', $request->lesson_id)
            ->where('user_id', $request->user()['id'])
            ->first();
        if ($existingNote) {
            return response()->json(['error' => 'Note for this lesson already exists'], 400);
        }

        try {
            $note = new Note;
            $note->user_id = $request->user()['id'];
            $note->lesson_id = $request->lesson_id;
            $note->content = $request->note_content;
            $note->save();
            return response()->json(['success' => 'Note created'], 201);
        } catch (QueryException $e) {
            return response()->json(['error', $e->getMessage()], 500);
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
            return response()->json(['error' => 'Note not found'], 404);
        }
    }

    public function destroy($id, Request $request)
    {
        try {
            $note = Note::where('id', $id)->where('user_id', $request->user()['id'])->firstOrFail();
            $note->delete();

            return response()->json(['success' => 'Note deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note not found'], 404);
        }
    }
}
