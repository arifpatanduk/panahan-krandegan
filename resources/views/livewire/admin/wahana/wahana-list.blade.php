<div class="col-12">
    
    @if ($addWahana)
        @include('livewire.admin.wahana.create-wahana')    
    @endif

    @if ($editImage)
        @if (session()->has('imageStored'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('imageStored')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->has('imageDeleted'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('imageDeleted')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @livewire('admin.wahana.wahana-image', ['wahana_id'=>$wahana_id], key(time() . $wahana_id))
    @endif
    

    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between">
                <h4>Daftar Wahana</h4>
                <button class="btn btn-primary btn-sm" wire:click.prevent="createWahana">
                    <span class="typcn typcn-plus"></span>
                    Wahana
                </button>
            </div>

            {{-- wahana list --}}
            <div class="table-responsive my-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($wahanas->count() != 0)
                        @foreach ($wahanas as $wahana)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <h5 class="font-weight-bold">{{$wahana->title}}</h5>
                                <div>
                                    {{$wahana->updated_at->format('d F Y')}}
                                </div>
                            </td>
                            <td>
                                Rp. {{$wahana->price}},00
                            </td>
                            <td>
                                <button class="btn btn-xs btn-warning mb-2" wire:click.prevent="editWahana({{$wahana->id}})">
                                    <span class="typcn typcn-pencil"></span>
                                    Edit
                                </button>
                                <button class="btn btn-xs btn-info mb-2" wire:click.prevent="editImage({{$wahana->id}})">
                                    <span class="typcn typcn-image-outline"></span>
                                    Image
                                </button>
                                <button class="btn btn-xs btn-danger mb-2" wire:click.prevent="deleteWahana({{$wahana->id}})">
                                    <div wire:target="deleteWahana({{$wahana->id}})" wire:loading >
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                        Menghapus
                                        </span>
                                    </div>
                                    <div wire:target="deleteWahana({{$wahana->id}})" wire:loading.remove>
                                        <span class="typcn typcn-trash"></span> Hapus
                                    </div>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data wahana</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>