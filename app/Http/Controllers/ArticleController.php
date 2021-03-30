<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ArticleController extends Controller
{
    public function index($type)
    {
        return view('article.index', [
            'type' => $type
        ]);
    }

    public function show($type, Article $article)
    {
        return view('article.show', [
            'article' => $article,
            'comments' => $article->comments,
        ]);
    }

    public function create()
    {
        return view('article.create');
    }

    public function store()
    {
        $article = new Article($this->validateArticle());
        $article->user_id = Auth::user()->id;
        $article->type = request('type');
        $article->excerpt = $this->makeExcerpt(request('body'));
        $article->save();

        return redirect('/articles/all');
    }

    protected function makeExcerpt($body)
    {
        return substr($body, 0, 41);
    }

    protected function validateArticle (){
        return request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:15'],
            'title_photo_path' => ['required', 'min:10'],
        ]);
    }
}
