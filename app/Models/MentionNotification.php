<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MentionNotification extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'mention_notification';
    protected $fillable = [
        'user_id',
        'type',
        'data',
        'read_at',
        'isFavorite',
        'isArchived',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
