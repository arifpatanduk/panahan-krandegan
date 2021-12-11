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
            <label for="exampleTextarea1">Konten</label>
            <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror"
                rows="4"></textarea>

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