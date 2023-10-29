<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MyHorse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'avatar',
        'gender',
        'race',
        'color',
        'height',
        'fei_id',
    ];

    public static array $gender = [
        'male' => 'Erkek',
        'female' => 'Dişi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
