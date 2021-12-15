<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Admin\Information\Information;
use App\Models\Admin\Information\InformationType;
use Livewire\Component;

class InformationList extends Component
{

    //variable
    public $name, $type, $desc, $information_id=null;
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

    public function editInformation($information_id)
    {
        $information_data = Information::find($information_id);
        $this->information_id = $information_id;
        $this->name = $information_data->name;
        $this->type = $information_data->information_type_id;
        $this->desc = $information_data->desc;
        $this->addInformation = true;
    }

    public function cancelCreateInformation()
    {
        $this->resetInputFields();
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


        Information::updateOrCreate(
            ['id'=>$this->information_id],
            [
                'name' => $this->name,
                'information_type_id' => $this->type,
                'desc' => $this->desc,
                'total_rating' => 0
            ]
        );

        $this->addInformation = false;

        $this->emit('informationStored');
        $this->resetInputFields();
    }

    public function deleteInformation($information_id)
    {
        Information::destroy($information_id);
        $this->emit('informationDeleted');
    }
}
