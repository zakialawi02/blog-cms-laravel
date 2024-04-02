<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'user_id',
        'title',
        'content',
        'slug',
        'excerpt',
        'status',
        'published_at',
        'views',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
