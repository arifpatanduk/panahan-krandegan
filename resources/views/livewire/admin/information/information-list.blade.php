<div>
    @if($addInformation==true)
        @include('livewire.admin.information.create-information')
    @else
        <button class="my-2 btn btn-sm btn-primary" wire:click.prevent="createInformation">
            <span class="typcn typcn-document-add"></span>
            Buat Informasi
        </button>
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
                @if($informations->count() != 0)
                @foreach ($informations as $information)
                <tr>
                    <td>
                        <h5 class="font-weight-bold">{{$information->name}}</h5>
                        <div class=" mb-1">
                            {{$information->desc}} 
                        </div>
                        <div>
                            {{$information->updated_at->format('d F Y')}}
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-xs btn-warning mb-2">
                            <span class="typcn typcn-pencil"></span>
                            Edit
                        </button>
                        <button class="btn btn-xs btn-danger mb-2">
                            <span class="typcn typcn-trash"></span> Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>Tidak ada data informasi</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>