<?php

namespace App\Http\Livewire\Admin\Gallery;

use Livewire\Component;

class Gallery extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.admin.gallery.gallery');
    }

    public function galleryUpdated($message)
    {
        session()->flash('categoryUpdated', $message);
    }
}
