<div>
    <div class="d-flex justify-content-between">
        <div wire:ignore>
            <h4 class="card-title">
                <p class="mt-2 col-md-11">{{ $title }}</p>
            </h4>
        </div>
        <button type="button" class="close mx-2" wire:click.prevent="cancelManageArticle">
            <span class="typcn typcn-times"></span>
        </button>
    </div>

    {{-- interaksi --}}
    <div class="card mb-3">
        <div class="card-body mb-1">
            <h5 class="card-title">Interaksi</h5>
            <button class="btn btn-sm btn-outline-warning mb-2" data-toggle="modal"
                data-target="#comments-{{ $article->id }}">
                <span class="typcn typcn-message"></span>
                {{ count($article->allCommnets) }} Komentar
            </button>
            <button class="btn btn-sm btn-outline-success mb-2" data-toggle="modal"
                data-target="#likes-{{ $article->id }}">
                <span class="typcn typcn-thumbs-up"></span>
                {{ count($article->allLikes) }} Suka
            </button>
        </div>
    </div>


    {{-- comment modal --}}
    <x-modal id="comments-{{ $article->id }}" title="Komentar" :scrollable="true">
        <x-slot name="body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($article->allCommnets as $comment)
                        <tr>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->body }}</td>
                            <td>{{ $comment->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </x-slot>
    </x-modal>

    {{-- likes modal --}}
    <x-modal id="likes-{{ $article->id }}" title="Likes" :scrollable="true">
        <x-slot name="body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($article->allLikes as $like)
                        <tr>
                            <td>{{ $like->user->name }}</td>
                            <td>{{ $like->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </x-slot>
    </x-modal>


    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Edit Artikel</h5>
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

                <button type="submit" class="btn btn-primary mr-2">Update
                    <div wire:target="updateArticle({{ $manageMode }})" wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                        </span>
                    </div>
                </button>
                <button wire:click.prevent="cancelManageArticle" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>

    {{-- interaksi --}}
    <div class="card mb-3">
        <div class="card-body mb-1">
            <h5 class="card-title mb-1">Hapus Artikel</h5>
            <h6 class="card-subtitle">Artikel yang telah dihapus tidak dapat dikembalikan.</h6>

            @if (!$deleteMode)
            <button class="btn btn-sm btn-danger mb-2" wire:click.prevent="deleteArticle({{ $article->id }})">
                <span class="typcn typcn-trash"></span>
                Hapus
            </button>

            @elseif($deleteMode == $article->id)
            <div>
                <p class="font-weight-bold">Yakin ingin menghapus artikel ini?</p>
                <button class="btn btn-sm btn-danger" wire:click.prevent="destroyArticle({{ $article->id }})">
                    Ya, hapus!
                    <div wire:target="destroyArticle({{ $article->id }})" wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                        </span>
                    </div>
                </button>

                <button class="btn btn-sm btn-outline-light text-dark"
                    wire:click.prevent="cancelDeleteArticle({{ $article->id }})">
                    Batal
                </button>
            </div>
            @endif
        </div>
    </div>
</div>