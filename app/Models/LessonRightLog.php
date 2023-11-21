<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonRightLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'user_id',
        'token',
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
