<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ShowArticles extends Component
{
    use WithPagination;

    public $path;
    public $type;


    public function mount ($path) {
        $this->path = $path;

    }

    public function render()
    {
        $this->type = $this->pathDefinition($this->path);

        if ($this->type === 'all') {
            $articles = Article::orderBy('created_at', 'desc')->paginate(8);
        }
        else {
            $articles = Article::where('type', $this->type)->orderBy('created_at', 'desc')->paginate(8);
        }

        return view('livewire.show-articles', [
            'articles' => $articles
        ]);
    }

    private function pathDefinition($path)
    {
        $type = substr($path, strrpos($path, '/') + 1, strlen($path));
        return $type;
    }

}
