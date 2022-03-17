 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ 'Tambah Data Produk' }}</div>
            <div class="card-body">
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    <label for="nama" class="col-md-12 col-form-label text-md-left">{{ 'Nama Produk' }}</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                        wire:model="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="harga" class="col-md-12 col-form-label text-md-left">{{ 'Harga Produk' }}</label>
                    <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                        wire:model="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <label for="berat" class="col-md-12 col-form-label text-md-left">{{ 'Berat Produk' }}</label>
                    <input id="berat" type="number" class="form-control @error('berat') is-invalid @enderror"
                        wire:model="berat" value="{{ old('berat') }}" required autocomplete="berat" autofocus>
                    @error('berat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="gambar"
                        class="col-md-12 col-form-label text-md-left">{{ 'Gambar Produk (*max 2MB)' }}</label>
                    <input type="file" id="" wire:model="gambar">
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-block mt-5">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
