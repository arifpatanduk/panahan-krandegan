<div>
    <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between">
            <label>Foto dan Gambar</label>
            <div>
              <button class="btn btn-sm btn-primary" wire:click.prevent="addImage">
                <span class="typcn typcn-plus"></span>
                Gambar
              </button>
              <button class="btn btn-sm btn-light" wire:click.prevent="$emit('cancelEditImage')">
                Selesai
              </button>
            </div>
          </div>
          
          {{-- image upload form --}}
          @if ($addImage)
            <form wire:submit.prevent="storeImage">
                <div class="form-group mb-3">
                  <label for="image">Gambar</label>
                    <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror" placeholder="pilih gambar">
                    @error('image')
                        <span class="text-danger error"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="mb-3">
                  @if ($image)
                      <img src="{{$image->temporaryUrl()}}" class="img-fluid rounded">
                  @endif
                  @if($img_preview)
                      <img src="{{Storage::url($img_preview)}}" class="img-fluid rounded">
                  @endif
                </div>
                <div class="form-group mb-3">
                  <label for="img_desc">Deskripsi (optional)</label>
                  <input type="text" wire:model="img_desc" class="form-control @error('img_desc') is-invalid @enderror" placeholder="masukkan keterangan gambar">
                  @error('img_desc')
                        <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
                <div>
                  
                    <div class="d-flex justify-content-end my-2">
                        <button wire:click.prevent="cancelAddImage" class="btn btn-xs btn-danger mx-2">
                            Batal
                        </button>
                        <button class="btn btn-xs btn-info">Simpan
                            <div wire:target="storeImage" wire:loading>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                </span>
                                Menyimpan..
                            </div>
                        </button>
                    </div>
                </div>
            </form>
          @endif

          <div class="table-responsive">
            <table class="table table-borderles">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Images</th>
                  <th>Deskripsi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($images_data as $img)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{Storage::url($img->images)}}">
                        </td>
                        <td>
                          {{$img->desc}}
                        </td>
                        <td class="text-center">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click.prevent="deleteImage({{$img->id}})">
                            <div wire:target="deleteImage({{$img->id}})" wire:loading.remove>
                              <span aria-hidden="true">&times;</span>
                            </div>
                            <div wire:target="deleteImage({{$img->id}})" wire:loading>
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                          </button>
                          <button type="button" class="close mx-2" data-toggle="modal" data-target="#img-preview-{{$img->id}}" wire:click.prevent="showImage({{$img->images}})" >
                            <span class="typcn typcn-eye-outline"></span>
                          </button>
                          <x-modal id="img-preview-{{$img->id}}" title="Lihat Gambar" :scrollable="true">
                            <x-slot name="body">
                              <div class="form-group">
                                <input type="text" value="{{$img->desc}}" disabled class="form-control">
                              </div>
                              <img src="{{Storage::url($img->images)}}" alt="" style="width:100%;height:100%;border-radius:0; !important">
                            </x-slot>
                            <x-slot name="footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </x-slot>
                          </x-modal>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>

</div>
