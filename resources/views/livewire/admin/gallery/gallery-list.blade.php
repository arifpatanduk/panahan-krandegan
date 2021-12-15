<div>
    @if ($manageMode)
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        @include('livewire.admin.gallery.edit-gallery')
    </div>
    @else

    @if (!$addMode)
    <button wire:click.prevent="addGallery" class="my-2 btn btn-sm btn-primary">
        <span class="typcn typcn-document-add"></span>
        Buat Galeri
    </button>
    @else
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        @include('livewire.admin.gallery.create-gallery')
    </div>
    <hr>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th style="width: 25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                <tr>
                    <td>
                        <div class="font-weight-bold mb-1">
                            <h4>
                                {{ $gallery->title }}
                            </h4>
                        </div>
                        <div>
                            <span class="badge badge-sm badge-outline-light badge-pill text-dark">
                                {{ $gallery->updated_at }}
                            </span>
                        </div>
                    </td>
                    <td>
                        <button wire:click.prevent="manageGallery({{ $gallery->id }})"
                            class="btn btn-sm btn-warning mb-2">
                            <span class="typcn typcn-cog"></span>
                            Edit
                        </button>
                        <button wire:click.prevent="deleteGallery({{ $gallery->id }})"
                            class="btn btn-sm btn-danger mb-2">
                            <span class="typcn typcn-trash"></span>
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>