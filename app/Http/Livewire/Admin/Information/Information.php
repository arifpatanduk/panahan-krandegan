<?php

namespace App\Http\Livewire\Admin\Information;

use Livewire\Component;

class Information extends Component
{
    public $user;

    protected $listeners = [
        'informationTypeStored',
        'informationTypeUpdated',
        'cantDeleteType',
        'informationStored'

    ];
    
    public function render()
    {
        return view('livewire.admin.information.information');
    }

    public function informationTypeStored()
    {
        # code...
        session()->flash('typeStored', "Berhasil menambahkan tipe");
    }

    public function informationTypeUpdated()
    {
        # code...
        session()->flash('typeUpdated', "Berhasil mengubah tipe");
    }

    public function cantDeleteType()
    {
        session()->flash('cantDeleteType', "Tidak bisa menghapus tipe informasi yang sedang digunakan");
    }

    public function informationStored()
    {
        session()->flash('informationStored', 'Informasi berhasil ditambahkan');
    }
}
