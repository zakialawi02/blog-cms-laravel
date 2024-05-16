<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestContributor extends Model
{
    use HasFactory;

    protected $table = 'request_contributors';
    protected $fillable = [
        'user_id',
        'code',
        'valid_code_until',
    ];

    protected $casts = [
        'valid_code_until' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
