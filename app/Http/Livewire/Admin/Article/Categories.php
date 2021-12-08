<?php

namespace App\Http\Livewire\Admin\Article;

use Livewire\Component;

class Categories extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.admin.article.categories');
    }
}
