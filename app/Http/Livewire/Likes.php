<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Likes extends Component
{
    public $article;
    public $rating;

    public function mount($article)
    {
        $this->article = $article;
        $this->rating = $article->rating();
    }

    public function like()
    {
        $this->article->like(Auth::user());
        $this->updateRating();
    }

    public function dislike()
    {
        $this->article->dislike(Auth::user());
        $this->updateRating();
    }

    public function updateRating()
    {
        $this->rating = $this->article->rating();
    }

    public function render()
    {
        return view('livewire.likes', ['rating' => $this->rating]);
    }

}
