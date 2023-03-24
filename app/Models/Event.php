<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Topic;

class Event extends Model
{
    //* this model is automatically associated to events table due to name conventions
    use HasFactory;

    // Many to many relationship with User
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function topics(): BelongsToMany
    {
        // connect event with topic models using foreign keys event_id and topic_id in pivot table
        return $this->belongsToMany(Topic::class, 'event_topic_lesson_instructor', 'event_id', 'topic_id');
    }
}
