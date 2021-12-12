<div>

    @if ($addMode)
    <div>
        <form wire:submit.prevent="storeCategory">
            <div class="mb-2">
                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text"
                    placeholder="Masukkan nama kategori" />

                @error('name')
                <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div>
                <div class="d-flex justify-content-end my-2">
                    <button wire:click.prevent="cancelAddCategory" class="btn btn-xs btn-danger mx-2">
                        Cancel
                    </button>
                    <button class="btn btn-xs btn-info">Submit
                        <div wire:target="storeCategory" wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>

    @else
    <button wire:click.prevent="addCategory" class="my-2 btn btn-sm btn-secondary">
        <span class="typcn typcn-th-large"></span>
        Kategori
    </button>
    @endif

    {{-- @if (session()->has('cantDelete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('cantDelete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
    @endif --}}

    <div class="table-responsive">
        <table class="table table-sm">
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    @if ($editMode === $category->id)
                    <td colspan="2">
                        <form wire:submit.prevent="updateCategory({{ $category->id }})">
                            <div class="input-group">
                                <input wire:model='new_name' type="text"
                                    class="form-control @error('new_name') is-invalid @enderror"
                                    placeholder="Masukkan kategori">

                                <button wire:click.prevent="updateCategory({{ $category->id }})"
                                    class="btn btn-sm btn-outline-success" type="button">
                                    <div wire:target="updateCategory({{ $category->id }})" wire:loading>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                        </span>
                                    </div>
                                    <div wire:target="updateCategory({{ $category->id }})" wire:loading.remove>
                                        <span class="typcn typcn-tick"></span>
                                    </div>
                                </button>

                                <button wire:click.prevent="cancelEditCategory({{ $category->id }})"
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
                        {{ $category->name }}
                    </td>
                    <td style="max-width: 40%">
                        <button wire:click.prevent="editCategory({{ $category->id }})"
                            class="btn btn-sm btn-warning mb-2">
                            <span class="typcn typcn-pencil"></span>
                        </button>

                        <button @if (in_array($category->id, $category_id_used))
                            disabled
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Category is used"
                            @else
                            wire:click.prevent='deleteCategory({{ $category->id }})'
                            @endif
                            class="btn btn-sm btn-dark mb-2">
                            <div wire:target="deleteCategory({{ $category->id }})" wire:loading>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                </span>
                            </div>
                            <div wire:target="deleteCategory({{ $category->id }})" wire:loading.remove>
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
        {{ $categories->links() }}
    </div>

</div>