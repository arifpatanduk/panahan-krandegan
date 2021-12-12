<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Admin\Information\Information;
use App\Models\Admin\Information\InformationType;
use Livewire\Component;

class InformationList extends Component
{

    //variable
    public $name, $type, $desc;
    public $informations;

    //conditional
    public $addInformation = false;

    public function resetInputFields()
    {
        $this->name = null;
        $this->type = null;
        $this->desc = null;
    }
    

    public function createInformation()
    {
        $this->addInformation = true;
    }

    public function cancelCreateInformation()
    {
        $this->addInformation = false;
    }

    public function mount()
    {
        $this->informations = Information::all();
    }

    public function render()
    {
        return view('livewire.admin.information.information-list',[
            'informationTypes'=>InformationType::all()
        ]);
    }

    public function storeInformation()
    {
        $this->validate([
            'name'=> 'required',
            'type'=> 'required',
            'desc'=> 'required'
        ]);


        Information::create([
            'name' => $this->name,
            'information_type_id' => $this->type,
            'desc' => $this->desc,
            'total_rating' => 0
        ]);

        $this->addInformation = false;

        $this->emit('informationStored');
        $this->resetInputFields();
    }
}
