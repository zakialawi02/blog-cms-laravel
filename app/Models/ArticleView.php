<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleView extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'article_id',
        'viewed_at',
        'ip_address',
        'location',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
