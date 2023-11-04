<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static array $type = [
        'executive' => 'Yönetici',
        'trainer' => 'Antrenör',
        'student' => 'Öğrenci',
    ];

    public function myHorses(): HasMany
    {
        return $this->hasMany(MyHorse::class);
    }

    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class);
    }

    public function memberships(): BelongsToMany
    {
        return $this->belongsToMany(Club::class);
    }

    public function trainerLessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'trainer_id');
    }

    public function studentLessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'student_id');
    }
}
