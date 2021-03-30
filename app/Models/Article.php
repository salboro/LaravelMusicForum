<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use Likable;

    protected $guarded = [];

    public function translateType()
    {
        $russianDictionary = [
            'guides' => 'Руководства',
            'reviews' => 'Обзоры музыкальных инструментов',
            'discourses' => 'Размышления'
        ];
        return $russianDictionary[$this->type];
    }

    public static function getInterestingArticles(Article $article)
    {
        $articles = Article::where('id', '<>', $article->id)->get()->shuffle()->take(6);
        return $articles;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
