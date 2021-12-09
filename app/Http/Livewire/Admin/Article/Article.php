<?php

namespace App\Http\Livewire\Admin\Article;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Article extends Component
{
    public $user;

    protected $listeners = [
        'categoryUpdated',
        'cantDeleteCategory'
    ];


    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.admin.article.article');
    }

    public function categoryUpdated()
    {
        # code...
    }

    public function cantDeleteCategory()
    {
        session()->flash('cantDelete', "Can't delete the currently used category");
    }
}
