<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{

    use HasFactory;


    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'event_topic_lesson_instructor', 'instructor_od', 'lesson_id');
    }
}
