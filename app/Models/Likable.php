<?php


namespace App\Models;



use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function rating()
    {
        return $this->likes()->where('liked', true)->count() - $this->likes()->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes->where('article_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('article_id', $this->id)->where('liked', false)->count();
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id()
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }
}
