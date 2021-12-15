<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Admin\Gallery\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryList extends Component
{
    use WithFileUploads;

    public $galleries;
    public $title;
    public $image;
    public $desc;
    public $new_image;

    public $addMode = false;
    public $manageMode = false;

    public function mount()
    {
        $this->galleries = Gallery::all();
    }

    public function render()
    {
        return view('livewire.admin.gallery.gallery-list');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->image = '';
        $this->desc = '';
    }


    // create
    public function addGallery()
    {
        $this->addMode = true;
    }

    public function cancelAddGallery()
    {
        $this->addMode = false;
        $this->resetInputFields();
    }

    public function storeGallery()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|image',
            'desc' => 'required',
        ]);

        // store image to storage
        $image =  $this->image->storePublicly('public/gallery/image', 'local');
        $image = Storage::disk('local')->url($image);

        // store to db
        Gallery::create([
            'admin_id' => Auth::user()->id,
            'title' => $this->title,
            'image' => $image,
            'desc' => $this->desc,
            'status' => '1',
        ]);

        $this->addMode = false;
        $this->emit('galleryUpdated', 'Galeri berhasil ditambahkan!');

        $this->resetInputFields();
    }


    // manage 
    public function manageGallery($gallery_id)
    {
        $this->manageMode = $gallery_id;

        $gallery = Gallery::find($gallery_id);

        $this->title = $gallery->title;
        $this->image = $gallery->image;
        $this->desc = $gallery->desc;
    }

    public function cancelManageGallery()
    {
        $this->manageMode = false;
        $this->resetInputFields();
    }

    public function updateGallery($gallery_id)
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        if ($this->new_image) {
            // dd($this->new_image);
            $this->validate([
                'new_image' => 'required|image'
            ]);

            // update image to storage
            $image =  $this->new_image->storePublicly('public/gallery/image', 'local');
            $image = Storage::disk('local')->url($image);

            // delete old image
            Storage::disk('local')->delete($this->image);
        }


        // update to db
        $gallery = Gallery::find($gallery_id);
        $gallery->title = $this->title;
        $gallery->image = $image;
        $gallery->desc = $this->desc;
        $gallery->save();

        $this->manageMode = false;
        $this->emit('galleryUpdated', 'Galeri berhasil diupdate!');

        $this->resetInputFields();
    }


    // delete
    public function deleteGallery($gallery_id)
    {
        
    }
}
