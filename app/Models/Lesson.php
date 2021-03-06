<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function notes() {
        return $this->hasMany(Note::class);
    }
}
