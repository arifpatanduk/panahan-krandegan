<div>
    <h4 class="card-title">Kelola Iklan</h4>
    <form class="forms-sample" wire:submit.prevent="updateAds({{ $manageMode }})">
        <div class="form-group">
            <label for="exampleInputName1">Nama Iklan</label>
            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror"
                placeholder="Masukkan nama iklan">

            @error('name')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
        </div>

        <div class="form-group">
            <label>Gambar</label>
            <div class="input-group mb-3">
                <input wire:model="new_image" type="file" accept="image/*"
                    class="form-control @error('new_image') is-invalid @enderror" id="inputGroupFile02">
            </div>

            @error('new_image')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror

            <img src="{{ asset($image) }}" class="img-fluid" alt="...">
        </div>

        <div class="form-group">
            <label for="exampleTextarea1">Deskripsi</label>
            <textarea wire:model="desc" class="form-control @error('desc') is-invalid @enderror"
                rows="4"></textarea>

            @error('desc')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleTextarea1">Link</label>
            <textarea wire:model="link" class="form-control @error('link') is-invalid @enderror"
                rows="4"></textarea>

            @error('link')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mr-2">Submit
            <div wire:target="updateAds({{ $manageMode }})" wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                </span>
            </div>
        </button>
        <button wire:click.prevent="cancelManageAds" class="btn btn-light">Cancel</button>
    </form>
</div>