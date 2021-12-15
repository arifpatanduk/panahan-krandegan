<div class="my-2">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Wahana</h4>
          <form class="forms-sample" wire:submit.prevent="storeWahana">
            <div class="form-group">
              <label for="title">Nama Wahana</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Masukkan nama wahana" wire:model="title">
              @error('title')
                <span class="text-danger error"><small>{{ $message }}</small></span>
              @enderror
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                    </div>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Masukkan harga wahana" wire:model="price">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">,00</span>
                    </div>
                </div>
                @error('price')
                  <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
              </div>
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                {{-- <x-forms.tinymce-editor/> --}}
                <textarea class="form-control @error('desc') is-invalid @enderror" wire:model="desc" id="information_desc" cols="30" rows="10" placeholder="Masukkan deskripsi wahana"></textarea>
                @error('desc')
                  <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">
              <div wire:target="storeWahana" wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                  Menyimpan ...
                </span>
              </div>
              <div wire:target="storeWahana" wire:loading.remove>
                  Simpan
              </div>
            </button>
            <button class="btn btn-light" wire:click.prevent="cancelCreateWahana">Batal</button>
          </form>
        </div>
    </div>    
</div>