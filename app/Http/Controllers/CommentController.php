<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store()
    {
        $comment = new Comment($this->validateComment());
        $comment->user_id = Auth::user()->id;
        $comment->article_id = request('article_id');
        $comment->save();
        return back();
    }

    protected function validateComment()
    {
        return request()->validate([
            'body' => ['required']
        ]);
    }
}
