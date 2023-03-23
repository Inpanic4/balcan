<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    //* this model is automatically associated to events table due to name conventions
    use HasFactory;

    // Many to many relationship with User
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
