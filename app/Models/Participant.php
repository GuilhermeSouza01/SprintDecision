<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    protected $fillable = [
        'room_id',
        'email',
    ];
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
