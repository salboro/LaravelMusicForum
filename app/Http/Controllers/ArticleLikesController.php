<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleLikesController extends Controller
{
    public function store(Article $article)
    {


        return back();
    }

    public function destroy(Article $article)
    {
        $article->dislike(Auth::user());

        return back();
    }
}
