<div>
    @if($addInformation==true)
        @include('livewire.admin.information.create-information')
    @else
        <button class="my-2 btn btn-sm btn-primary" wire:click.prevent="createInformation">
            <span class="typcn typcn-document-add"></span>
            Buat Informasi
        </button>
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
        @livewire('admin.information.information-image', ['information_id'=>$information_id], key(time() . $information_id))
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th style="width: 25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($informations->count() != 0)
                @foreach ($informations as $information)
                <tr>
                    <td>
                        <h5 class="font-weight-bold">{{$information->name}}</h5>
                        <div class=" mb-2">
                            {{strlen($information->desc) > 100  ? substr($information->desc, 0, 100)." ... " : $information->desc}}
                        </div>
                        <div>
                            <small>{{$information->updated_at->format('d F Y')}}</small>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-xs btn-warning mb-2" wire:click.prevent="editInformation({{$information->id}})">
                            <span class="typcn typcn-pencil"></span>
                            Edit
                        </button>
                        <button class="btn btn-xs btn-info mb-2" wire:click.prevent="editImage({{$information->id}})">
                            <span class="typcn typcn-image-outline"></span>
                            Image
                        </button>
                        <button class="btn btn-xs btn-danger mb-2" wire:click.prevent="deleteInformation({{$information->id}})">
                            <div wire:target="deleteInformation({{$information->id}})" wire:loading >
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                  Menghapus
                                </span>
                            </div>
                            <div wire:target="deleteInformation({{$information->id}})" wire:loading.remove>
                                <span class="typcn typcn-trash"></span> Hapus
                            </div>
                        </button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="2" class="text-center">Tidak ada data informasi</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>