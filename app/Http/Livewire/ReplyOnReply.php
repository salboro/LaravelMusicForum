<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ReplyOnReply extends Component
{
    public $comment;
    public $isVisible = 'hidden';

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function unHidden()
    {
        $this->isVisible = null;
    }

    public function hidden()
    {
        $this->isVisible = 'hidden';
    }

    public function render()
    {
        return view('livewire.reply', [
            'visible' => $this->isVisible,
            'comment' => $this->comment->id
        ]);
    }
}
