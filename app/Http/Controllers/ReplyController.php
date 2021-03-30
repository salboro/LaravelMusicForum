<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store()
    {
        $reply = new Reply($this->validateComment());
        $reply->user_id = Auth::user()->id;
        $reply->comment_id = request('comment_id');
        $reply->save();
        return back();
    }

    protected function validateComment()
    {
        return request()->validate([
            'body' => ['required']
        ]);
    }
}
