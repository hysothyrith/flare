<?php

namespace App\Http\Controllers;

use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'note_content' => 'required'
        ]);

        try {
            $note = new Note;
            $note->user_id = $request->user()['id'];
            $note->lesson_id = $request->lesson_id;
            $note->content = $request->note_content;
            $note->save();
            return response()->json(['success' => 'Note created'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($id, Request $request)
    {
        try {
            return new NoteResource(Note::where('id', $id)
                ->where('user_id', $request->user()['id'])
                ->firstOrFail());

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Note not found'], 400);
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
