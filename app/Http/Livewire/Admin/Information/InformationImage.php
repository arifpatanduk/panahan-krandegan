<?php

namespace App\Http\Livewire\Admin\Information;

use App\Models\Admin\Information\InformationImages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InformationImage extends Component
{
    use WithFileUploads;
    //receive
    public $information_id;
    
    //variable
    public $images_data;
    public $image;
    public $img_preview = null;

    //conditional
    public $addImage = false;


    public function addImage()
    {
        $this->addImage = true;
    }

    public function cancelAddImage()
    {
        $this->image = null;
        $this->addImage = false;
    }

    public function showImage($image)
    {
        $this->img_preview = $image;
    }
    
    public function mount(){
        if($this->information_id != null){
            $this->images_data = InformationImages::where('information_id', $this->information_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.admin.information.information-image');
    }

    public function storeImage()
    {
        $this->validate([
            'image' => 'required|max:2048|mimes:jpg,jpeg,png'
        ]);
        
        $ekstensi = $this->image->getClientOriginalExtension();
        $nama_file =  Carbon::now()->timestamp . "." . $ekstensi;
        $image = Storage::disk('local')->putFileAs('public/information/images', $this->image, $nama_file);

        InformationImages::create([
            'information_id' => $this->information_id,
            'images' => $image
        ]);

        $this->image = null;
        $this->emit('imageStored');
    }

    public function deleteImage($image_id)
    {
        $image = InformationImages::find($image_id);
        Storage::delete($image->images);
        $image->delete();

        $this->emit('imageDeleted');
    }
}
