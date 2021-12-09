<div class="row my-2">
    {{-- article component --}}
    <div class="col-lg-8 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Daftar Artikel</h4>
                </div>

                @livewire('admin.article.article-list', key(time() . $user->id))

            </div>
        </div>
    </div>

    {{-- article category component --}}
    <div class="col-lg-4 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Daftar Kategori Artikel</h4>
                </div>

                @livewire('admin.article.categories', key(time() . $user->id))

            </div>
        </div>
    </div>
</div>