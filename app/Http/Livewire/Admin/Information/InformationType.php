<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Admin\Information\Information;
use App\Models\Admin\Information\InformationType as InformationInformationType;
use Livewire\Component;
use Livewire\WithPagination;

class InformationType extends Component
{
    
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    //existing data
    public $type_is_used;
    
    //collect data
    public $name;
    public $new_name;
    
    //condition
    public $addMode = false;
    public $editMode = false;


    public function mount()
    {
        $this->type_is_used = Information::pluck('information_type_id')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.information.information-type',[
            'informationTypes'=> InformationInformationType::latest()->paginate(10)
        ]);
    }

    private function resetInputFields($mode)
    {
        switch ($mode) {
            case 'add':
                $this->name = '';
                break;

            case 'edit':
                $this->new_name = '';
                break;
        }
    }


    //create
    public function addType()
    {
        $this->addMode = true;
    }

    public function cancelAddType()
    {
        $this->addMode = false;
        $this->resetInputFields('add');
    }

    public function storeType()
    {
        $this->validate([
            'name' => 'required'
        ]);

        InformationInformationType::create([
            'name' => $this->name
        ]);

        $this->emit('informationTypeStored'); // refresh
        $this->resetInputFields('add');
    }


    //edit
    public function editType($type_id)
    {
        $this->editMode = $type_id;

        $type = InformationInformationType::find($type_id);
        $this->new_name = $type->name;
    }

    public function cancelEditType($type_id)
    {
        $this->editMode = false;
        $this->resetInputFields('edit');
    }

    public function updateType($type_id)
    {
        $this->validate([
            'new_name' => 'required'
        ]);

        $type = InformationInformationType::find($type_id);
        $type->name = $this->new_name;
        $type->save();

        $this->editMode = false;
        $this->emit('informationTypeUpdated'); // refresh
        $this->resetInputFields('edit');
    }


    //delete
    public function deleteType($type_id)
    {
        // check if type is used
        if (in_array($type_id, $this->type_is_used)) {
            $this->emit('cantDeleteType');
        } else {
            InformationInformationType::destroy($type_id);
            $this->emit('informationTypeDeleted'); // refresh
        }
    }
}
