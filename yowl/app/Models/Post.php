<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'link',
            'content',
            'user_id',
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);

    }
}
