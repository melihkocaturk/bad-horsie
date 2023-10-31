<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
