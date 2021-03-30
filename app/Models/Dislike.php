<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public static function checkDislike($user, $article)
    {
        $userDislikesArticlesId = $user->dislikes->pluck('article_id');
        foreach ($userDislikesArticlesId as $article_id)
        {
            if ($article_id == $article->id)
                return true;
        }
        return false;
    }
}
