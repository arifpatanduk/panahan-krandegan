<?php

namespace App\Http\Livewire\Article;

use App\Models\Admin\Article\Article;
use App\Models\Admin\Article\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $article_id;
    public $article;

    public $total_comments;

    public $comment_body;


    public function mount()
    {
        $this->article = Article::find($this->article_id);
        $this->total_comments = count(Comment::where('article_id', $this->article_id)->get());
    }

    public function render()
    {
        return view('livewire.article.comments');
    }

    public function storeComment($parent_id = null)
    {
        $this->validate([
            'comment_body' => 'required'
        ]);

        Comment::create([
            'article_id' => $this->article_id,
            'user_id' => Auth::user()->id,
            'parent_id' => $parent_id,
            'body' => $this->comment_body
        ]);

        $this->emit('commentUpdated');
    }
}
