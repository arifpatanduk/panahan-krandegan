<div>
    <h4 class="card-title">Kelola Artikel</h4>
    <form class="forms-sample" wire:submit.prevent="updateArticle({{ $manageMode }})">
        <div class="form-group" wire:ignore>
            <label for="exampleSelectGender">Kategori</label>
            <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category_id==$category->id ? 'selected' : '' }}>{{
                    $category->name }}</option>
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
            <div class="input-group mb-2">
                <input wire:model="new_image" type="file" accept="image/*"
                    class="form-control @error('new_image') is-invalid @enderror" id="inputGroupFile02">
            </div>
            <small class="text-muted">Image max. 3 MB </small>

            @error('new_image')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror

            <div wire:loading wire:target="new_image">
                <div class="card-body">
                    <div>
                        <div class="spinner-grow spinner-grow-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                        Uploading...
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2">
            @if ($new_image)
            <div wire:ignore x-data="{
                setUp() {
                    console.log('test');
                    const cropper = new Cropper(document.getElementById('image'), {
                        aspectRatio: 4/3,
                        autoCropArea: 1,
                        viewMode: 1,
                        crop () {
                            @this.set('x', event.detail.x)
                            @this.set('y', event.detail.y)
                            @this.set('width', event.detail.width)
                            @this.set('height', event.detail.height)
                        }
                    })
                }
            }" x-init="setUp">

                <img id="image" src="{{ $new_image->temporaryUrl() }}" alt="thumbnail preview"
                    class="rounded-3 img-fluid img-thumbnail" style="width: 100%; max-width:100%">
            </div>

            @elseif ($image)
            <img src="{{ $image }}" alt="thumbnail preview" class="rounded-3 img-fluid img-thumbnail"
                style="width: 100%; max-width:100%">
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
            <div wire:target="updateArticle({{ $manageMode }})" wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                </span>
            </div>
        </button>
        <button wire:click.prevent="cancelManageArticle" class="btn btn-light">Cancel</button>
    </form>
</div>