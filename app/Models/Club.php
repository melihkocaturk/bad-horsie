<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'banner',
        'address',
        'phone',
        'email',
        'web',
        'coordinates',
        'tbf_link',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function horses(): MorphMany
    {
        return $this->morphMany(Horse::class, 'owner');
    }

    public function lessonRights(): HasMany
    {
        return $this->hasMany(lessonRight::class);
    }

    public function lessonRightLogs(): HasMany
    {
        return $this->hasMany(LessonRightLog::class);
    }
}
