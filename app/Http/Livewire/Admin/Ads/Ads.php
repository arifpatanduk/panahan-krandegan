<?php

namespace App\Http\Livewire\Admin\Ads;

use Livewire\Component;

class Ads extends Component
{
    public $user;
    
    public function render()
    {
        return view('livewire..admin.ads.ads');
    }
}
