<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Event extends Model
{
    //* this model is automatically associated to events table due to name conventions
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'event_topic_lesson_instructor', 'event_id', 'topic_id')
            ->distinct();
    }
}
