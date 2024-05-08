<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleView extends Model
{
    use HasFactory;

    protected $table = 'article_views';
    public $timestamps = false;
    protected $fillable = [
        'article_id',
        'viewed_at',
        'ip_address',
        'location',
        'code',
    ];
    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
