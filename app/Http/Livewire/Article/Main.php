<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;

class Main extends Component
{
    public $article_id;

    protected $listeners = [
        'likeUpdated' => 'render',
        'commentUpdated' => 'render',
    ];

    public function render()
    {
        return view('livewire.article.main');
    }
}
