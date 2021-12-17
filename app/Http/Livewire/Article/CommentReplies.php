<?php

namespace App\Http\Livewire\Article;

use App\Models\Admin\Article\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentReplies extends Component
{
    public $comment;
    public $article_id;

    public $body;

    public $replyMode = false;

    public function mount()
    {
        $this->article_id = $this->comment->article_id;
    }

    public function render()
    {
        return view('livewire.article.comment-replies');
    }

    public function reply($parent_id)
    {
        $this->replyMode = $parent_id;
    }

    public function cancelReply($parent_id)
    {
        $this->replyMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->body = '';
    }


    public function storeReply($parent_id)
    {
        $this->validate([
            'body' => 'required'
        ]);

        Comment::create([
            'article_id' => $this->article_id,
            'user_id' => Auth::user()->id,
            'parent_id' => $parent_id,
            'body' => $this->body
        ]);

        $this->emit('commentUpdated');
    }
}
