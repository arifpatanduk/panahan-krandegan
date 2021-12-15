<?php

namespace App\Http\Livewire\Admin\Wahana;

use App\Models\Wahana;
use Livewire\Component;

class WahanaList extends Component
{

    //exiting data
    public $wahanas;
    
    //variable
    public $title, $desc, $price, $wahana_id;
    
    //conditional
    public $addWahana = false;
    public $editImage = false;

    protected $listeners = [
        'imageStored',
        'imageDeleted',
        'cancelEditImage'
    ];

    public function resetInputFields()
    {
        $this->title = null;
        $this->price = null;
        $this->desc = null;
    }

    public function createWahana()
    {
        $this->addWahana = true;
        $this->resetInputFields();
    }

    public function editWahana($wahana_id)
    {
        $wahana_data = Wahana::find($wahana_id);
        $this->wahana_id = $wahana_id;
        $this->title = $wahana_data->title;
        $this->price = $wahana_data->price;
        $this->desc = $wahana_data->desc;
        $this->addWahana = true;
    }

    public function cancelCreateWahana()
    {
        $this->addWahana = false;
        $this->resetInputFields();
    }

    public function editImage($wahana_id)
    {
        $this->wahana_id = $wahana_id;
        $this->editImage = true;
    }

    public function cancelEditImage()
    {
        $this->editImage = false;
    }

    public function mount()
    {
        $this->wahanas = Wahana::all();
    }

    public function render()
    {
        return view('livewire.admin.wahana.wahana-list');
    }


    public function storeWahana()
    {
        $this->validate([
            'title'=> 'required',
            'price'=> 'required|numeric',
            'desc'=> 'required',
        ]);


        $wahana = Wahana::updateOrCreate(
            ['id'=>$this->wahana_id],
            [
                'title' => $this->title,
                'price' => $this->price,
                'desc' => $this->desc,
            ]
        );

        $this->addWahana = false;

        $this->emit('wahanaStored');
        $this->resetInputFields();
    }

    public function deleteWahana($wahana_id)
    {
        Wahana::destroy($wahana_id);
        $this->emit('wahanaDeleted');
    }

    public function imageStored()
    {
        session()->flash('imageStored', 'Gambar berhasil ditambahkan');
    }

    public function imageDeleted()
    {
        session()->flash('imageDeleted', 'Gambar berhasil dihapus');
    }
}
