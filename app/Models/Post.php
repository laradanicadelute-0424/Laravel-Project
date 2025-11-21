<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    protected $fillable = [
        'title',
        'content',
        'user_id', 
        'published_at', // Good practice to include this, too
    ];

    public function user(): BelongsTo { 

        return $this->belongsTo(User::class);
    }
}
