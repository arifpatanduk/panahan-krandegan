<div class="row my-2">
    {{-- information component --}}
    <div class="col-lg-8 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Daftar Informasi</h4>
                </div>
                @if (session()->has('informationStored'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('informationStored')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif(session()->has('informationDeleted'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('informationDeleted')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @livewire('admin.information.information-list', key(time() . $user->id))

            </div>
        </div>
    </div>

    {{-- information type component --}}
    <div class="col-lg-4 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">daftar Jenis Informasi</h4>
                </div>
                @if (session()->has('cantDeleteType'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{session('cantDeleteType')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('typeStored'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('typeStored')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('typeUpdated'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('typeUpdated')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @livewire('admin.information.information-type', key(time() . $user->id))

            </div>
        </div>
    </div>
</div>