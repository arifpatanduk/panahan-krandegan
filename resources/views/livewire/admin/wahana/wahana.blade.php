<div class="row my-2">
    <div class="col-12">
        @if (session()->has('wahanaStored'))
        <x-alert type="success" :dismissible="'true'">
            {{session('wahanaStored')}}
        </x-alert>
        @elseif(session()->has('wahanaDeleted'))
        <x-alert type="success" :dismissible="'true'">
            {{session('wahanaDeleted')}}
        </x-alert>
        @endif
    </div>
    @livewire('admin.wahana.wahana-list', key(time() . $user->id))
</div>
