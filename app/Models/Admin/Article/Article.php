<?php

namespace App\Models\Admin\Article;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'article_categories_id',
        'admin_id',
        'title',
        'content',
        'image',
        'status',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'article_categories_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function allCommnets()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function allLikes()
    {
        return $this->hasMany(Like::class, 'article_id');
    }
}
