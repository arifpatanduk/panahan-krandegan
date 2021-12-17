<div>
    @if ($manageMode)
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        @include('livewire.admin.article.edit-article')
    </div>
    @else

    @if (!$addMode)
    <button wire:click.prevent="addArticle" class="my-2 btn btn-sm btn-primary">
        <span class="typcn typcn-document-add"></span>
        Buat Artikel
    </button>
    @else
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        @include('livewire.admin.article.create-article')
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
                @foreach ($articles as $article)
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ $article->image }}" alt="" class="rounded img-fluid" />
                            </div>
                            <div class="col-md-10 font-weight-bold mb-1">
                                <h4>
                                    {{ $article->title }}
                                </h4>
                            </div>
                        </div>
                        <p>{{ $article->category->name }}</p>
                        <div>
                            <span class="badge badge-sm rounded-pill bg-light">
                                {{ $article->user->name }}
                            </span>
                            <span class="badge badge-sm badge-outline-light badge-pill text-dark">
                                {{ $article->updated_at }}
                            </span>
                        </div>
                    </td>
                    <td>
                        <button wire:click.prevent="manageArticle({{ $article->id }})"
                            class="btn btn-sm btn-warning mb-2">
                            <span class="typcn typcn-cog"></span>
                            Kelola
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-sm">
        {{ $articles->links() }}
    </div>
    @endif
</div>