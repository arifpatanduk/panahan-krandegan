<?php

namespace App\Http\Livewire\Article;

use App\Models\Admin\Article\Article;
use Jorenvh\Share\Share;
use Jorenvh\Share\ShareFacade;
use Livewire\Component;

class Main extends Component
{
    public $article_id;

    public $shareComponent;

    protected $listeners = [
        'likeUpdated' => 'render',
        'commentUpdated' => 'render',
    ];

    public function mount()
    {
        $article = Article::find($this->article_id);
        $this->shareComponent = ShareFacade::page(url()->current(), $article->title)
            ->facebook()
            ->telegram()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->getRawLinks();
    }

    public function render()
    {
        return view('livewire.article.main');
    }
}
