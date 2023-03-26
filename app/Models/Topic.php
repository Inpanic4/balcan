<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Topic extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_topic_lesson_instructor', 'topic_id', 'event_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'event_topic_lesson_instructor', 'topic_id', 'lesson_id')->distinct();
    }
}
