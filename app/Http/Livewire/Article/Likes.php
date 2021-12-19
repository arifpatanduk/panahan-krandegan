<?php

namespace App\Http\Livewire\Article;

use App\Models\Admin\Article\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Likes extends Component
{
    public $article_id;
    public $isLike;

    public function mount()
    {
        $this->isLike = Like::where([
            'article_id' => $this->article_id,
            'user_id' => Auth::user()->id,
        ])->first();
    }

    public function render()
    {
        return view('livewire.article.likes');
    }

    public function likeOrUnlike()
    {
        $user_id = Auth::user()->id;
        $article_id = $this->article_id;

        $this->isLike ? $this->isLike->delete() : Like::create(compact('article_id', 'user_id'));

        $this->emit('likeUpdated');
    }
}
