<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task as TaskModel;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'code', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(TaskModel::class);
    }

    public function selectedTask()
    {
        return $this->tasks()->where('selected', true)->first();
    }

    public function getSelectedTaskAttribute()
    {
        return $this->tasks()->where('selected', true)->first();
    }
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }
}
