<?php

namespace App\Http\Livewire\Admin\Wahana;

use Livewire\Component;

class Wahana extends Component
{
    public $user;

    protected $listeners = [
        'wahanaStored',
        'wahanaDeleted',
    ];

    public function render()
    {
        return view('livewire.admin.wahana.wahana');
    }

    public function wahanaStored()
    {
        session()->flash('wahanaStored', 'Data wahana berhasil disimpan');
    }

    public function wahanaDeleted()
    {
        session()->flash('wahanaDeleted', 'Data wahana berhasil dihapus');
    }

    // public function imageStored()
    // {
    //     session()->flash('imageStored', 'Gambar berhasil ditambahkan');
    // }

    // public function imageDeleted()
    // {
    //     session()->flash('imageDeleted', 'Gambar berhasil dihapus');
    // }
}
