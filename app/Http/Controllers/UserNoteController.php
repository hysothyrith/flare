<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserNoteCollection;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserNoteController extends Controller
{
    public function index(Request $request) {
        try {
            $user = User::where('id', $request->user()['id'])->firstOrFail();
            return new UserNoteCollection($user->notes);
        } catch (QueryException $e) {
            return response().json('error', $e->getMessage(), 500);
        }
    }
}
