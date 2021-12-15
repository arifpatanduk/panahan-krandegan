<?php

namespace App\Http\Livewire\Admin\Ads;

use App\Models\Admin\Ads\Ads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdsList extends Component
{
    use WithFileUploads;

    public $ads;
    public $name;
    public $desc;
    public $image;
    public $link;
    public $new_image;

    public $addMode = false;
    public $manageMode = false;

    public function mount()
    {
        $this->ads = Ads::all();
    }

    public function render()
    {
        return view('livewire..admin.ads.ads-list');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->image = '';
        $this->desc = '';
        $this->link = '';
    }

    // create
    public function addAds()
    {
        $this->addMode = true;
    }

    public function cancelAddAds()
    {
        $this->addMode = false;
        $this->resetInputFields();
    }

    public function storeAds()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|image',
            'desc' => 'required',
            'link' => 'required',
        ]);

        // store image to storage
        $image =  $this->image->storePublicly('public/ads/image', 'local');
        $image = Storage::disk('local')->url($image);

        // store to db
        Ads::create([
            'admin_id' => Auth::user()->id,
            'name' => $this->name,
            'image' => $image,
            'desc' => $this->desc,
            'link' => $this->link,
            'status' => '1',
        ]);

        $this->addMode = false;
        $this->emit('adsUpdated', 'Iklan berhasil ditambahkan!');

        $this->resetInputFields();
    }


    // manage 
    public function manageAds($ads_id)
    {
        $this->manageMode = $ads_id;

        $ads = Ads::find($ads_id);

        $this->name = $ads->name;
        $this->image = $ads->image;
        $this->desc = $ads->desc;
        $this->link = $ads->link;
    }

    public function cancelManageads()
    {
        $this->manageMode = false;
        $this->resetInputFields();
    }

    public function updateAds($ads_id)
    {
        $this->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        if ($this->new_image) {
            // dd($this->new_image);
            $this->validate([
                'new_image' => 'required|image'
            ]);

            // update image to storage
            $image =  $this->new_image->storePublicly('public/ads/image', 'local');
            $image = Storage::disk('local')->url($image);

            // delete old image
            Storage::disk('local')->delete($this->image);
        }


        // update to db
        $ads = Ads::find($ads_id);
        $ads->name = $this->name;
        $ads->image = $image;
        $ads->desc = $this->desc;
        $ads->link = $this->link;
        $ads->save();

        $this->manageMode = false;
        $this->emit('adsUpdated', 'Iklan berhasil diupdate!');

        $this->resetInputFields();
    }


    // delete
    public function deleteAds($ads_id)
    {
        
    }
}
