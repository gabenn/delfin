<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPosition extends Model
{
    protected $fillable = [
        'user_id',
        'lat',
        'long',
        'date',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
