<div>
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Informasi</h4>
          <form class="forms-sample" wire:submit.prevent="storeInformation">
            <div class="form-group">
              <label for="name">Nama Informasi</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama informasi" wire:model="name">
              @error('name')
                <span class="text-danger error"><small>{{ $message }}</small></span>
              @enderror
            </div>
            <div class="form-group">
              <label for="type">Jenis Informasi</label>
              <select wire:model="type" id="type" class="custom-select @error('type') is-invalid @enderror">
                <option  selected="true">pilih salah satu</option>
                  @foreach ($informationTypes as $type)
                      <option value="{{$type->id}}">{{$type->name}}</option>
                  @endforeach
              </select>
              @error('type')
                <span class="text-danger error"><small>{{ $message }}</small></span>
              @enderror
            </div>
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                {{-- <x-forms.tinymce-editor/> --}}
                <textarea class="form-control @error('desc') is-invalid @enderror" wire:model="desc" id="information_desc" cols="30" rows="10" placeholder="Masukkan deskripsi informasi"></textarea>
                @error('desc')
                  <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">
              <div wire:target="storeInformation" wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                  Menyimpan ...
                </span>
              </div>
              <div wire:target="storeInformation" wire:loading.remove>
                  Simpan
              </div>
            </button>
            <button class="btn btn-light" wire:click.prevent="cancelCreateInformation">Batal</button>
          </form>
        </div>
    </div>    
</div>