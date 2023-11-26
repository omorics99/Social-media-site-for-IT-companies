<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'start', 'location', 'end', 'user_id' // Include 'user_id' in fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }

    // Optionally, you can add a method to check if a user is the owner of the event
    public function isOwnedByUser($userId)
    {
        return $this->user_id === $userId;
    }
}
