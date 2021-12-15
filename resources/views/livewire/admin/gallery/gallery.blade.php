<div class="row my-2">
    {{-- article component --}}
    <div class="col-lg-12 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Daftar Galeri</h4>
                </div>

                @livewire('admin.gallery.gallery-list', key(time() . $user->id))

            </div>
        </div>
    </div>
</div>