<div>
    <h4 class="card-title">Form Buat Artikel</h4>
    <form class="forms-sample" wire:submit.prevent="storeArticle">
        <div class="form-group">
            <label for="exampleSelectGender">Kategori</label>
            <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option>-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Judul</label>
            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror"
                placeholder="Masukkan judul">

            @error('title')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label>Gambar</label>
            @if (!$image || $image == '' || $image == null)
            <div class="input-group mb-2">
                <input wire:model="image" type="file" accept="image/*"
                    class="form-control @error('image') is-invalid @enderror" id="inputGroupFile02">
            </div>
            <small class="text-muted">Image max. 3 MB </small>

            @error('image')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror

            <div wire:loading wire:target="image">
                <div class="card-body">
                    <div>
                        <div class="spinner-grow spinner-grow-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                        Uploading...
                    </div>
                </div>
            </div>

            @elseif ($image)
            <div wire:ignore x-data="{
                    setUp() {
                        const image = document.getElementById('image');
                        const cropper = new Cropper(image, {
                            aspectRatio: 4/3,
                            autoCropArea: 1,
                            viewMode: 1,
                            crop () {
                                console.log('test')
                                @this.set('x', event.detail.x)
                                @this.set('y', event.detail.y)
                                @this.set('width', event.detail.width)
                                @this.set('height', event.detail.height)
                            }
                        })
                    }
                }" x-init="setUp">

                <img id="image" src="{{ $image->temporaryUrl() }}" alt="Preview Image"
                    class="rounded-3 img-fluid img-thumbnail" style="width: 100%; max-width:100%">
            </div>
            @endif
        </div>


        <div class="form-group">
            <label for="exampleTextarea1">Konten</label>
            <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror" rows="10"
                cols="30"></textarea>

            @error('content')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mr-2">Submit
            <div wire:target="storeArticle" wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                </span>
            </div>
        </button>

        <button wire:click.prevent="cancelAddArticle" class="btn btn-light">Cancel</button>
    </form>
</div>