<div>
    @if ($addMode)
    <div>
        <form wire:submit.prevent="storeType">
            <div class="mb-2">
                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text"
                    placeholder="Masukkan jenis informasi" />

                @error('name')
                <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div>
                <div class="d-flex justify-content-end my-2">
                    <button wire:click.prevent="cancelAddType" class="btn btn-xs btn-danger mx-2">
                        Batal
                    </button>
                    <button class="btn btn-xs btn-info">
                        <div wire:loading.remove wire:target="storeType">
                            Simpan
                        </div>
                        <div wire:target="storeType" wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                            Menyimpan...
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>

    @else
    <button wire:click.prevent="addType" class="my-2 btn btn-sm btn-secondary">
        <span class="typcn typcn-th-large"></span>
        Jenis
    </button>
    @endif

    <div class="table-responsive">
        <table class="table table-sm">
            <tbody>
                @foreach ($informationTypes as $type)
                <tr>
                    @if ($editMode === $type->id)
                    <td colspan="2">
                        <form wire:submit.prevent="updateType({{ $type->id }})">
                            <div class="input-group">
                                <input wire:model='new_name' type="text"
                                    class="form-control @error('new_name') is-invalid @enderror"
                                    placeholder="Masukkan tipe informasi">

                                <button wire:click.prevent="updateType({{ $type->id }})"
                                    class="btn btn-sm btn-outline-success" type="button">
                                    <div wire:target="updateType({{ $type->id }})" wire:loading>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                        </span>
                                    </div>
                                    <div wire:target="updateType({{ $type->id }})" wire:loading.remove>
                                        <span class="typcn typcn-tick"></span>
                                    </div>
                                </button>

                                <button wire:click.prevent="cancelEditType({{ $type->id }})"
                                    class="btn btn-sm btn-outline-danger" type="button">
                                    <span class="typcn typcn-times"></span>
                                </button>

                                @error('new_name')
                                <span class="text-danger error"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                        </form>
                    </td>

                    @else

                    <td>
                        {{ $type->name }}
                    </td>
                    <td style="max-width: 40%">
                        <button wire:click.prevent="editType({{ $type->id }})"
                            class="btn btn-sm btn-warning mb-2">
                            <span class="typcn typcn-pencil"></span>
                        </button>

                        <button @if (in_array($type->id, $type_is_used))
                            disabled
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Tipe informasi sedang digunakan"
                            @else
                            wire:click.prevent='deleteType({{ $type->id }})'
                            @endif
                            class="btn btn-sm btn-dark mb-2">
                            <div wire:target="deleteType({{ $type->id }})" wire:loading>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                </span>
                                Menghapus...
                            </div>
                            <div wire:target="deleteType({{ $type->id }})" wire:loading.remove>
                                <span class="typcn typcn-trash"></span>
                            </div>
                        </button>
                    </td>
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="pagination-sm">
        {{ $informationTypes->links() }}
    </div>
</div>
