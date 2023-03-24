<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Instructor;

class Lesson extends Model
{
    use HasFactory;


    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'event_topic_lesson_instructor', 'lesson_id', 'instructor_id')
            ->withPivot('event_id', 'topic_id');
    }
}
