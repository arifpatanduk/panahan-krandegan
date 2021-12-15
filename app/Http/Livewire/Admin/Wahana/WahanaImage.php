<?php

namespace App\Http\Livewire\Admin\Wahana;

use App\Models\WahanaImage as ModelsWahanaImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class WahanaImage extends Component
{
    use WithFileUploads;
    //receive
    public $wahana_id;
    
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
        if($this->wahana_id != null){
            $this->images_data = ModelsWahanaImage::where('wahana_id', $this->wahana_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.admin.wahana.wahana-image');
    }

    public function storeImage()
    {
        $this->validate([
            'image' => 'required|max:2048|mimes:jpg,jpeg,png'
        ]);
        
        $ekstensi = $this->image->getClientOriginalExtension();
        $nama_file =  Carbon::now()->timestamp . "." . $ekstensi;
        $image = Storage::disk('local')->putFileAs('public/wahana/images', $this->image, $nama_file);

        ModelsWahanaImage::create([
            'wahana_id' => $this->wahana_id,
            'images' => $image
        ]);

        $this->image = null;
        $this->emit('imageStored');
    }

    public function deleteImage($image_id)
    {
        $image = ModelsWahanaImage::find($image_id);
        Storage::delete($image->images);
        $image->delete();

        $this->emit('imageDeleted');
    }
}
