<div class="container">
    @if (Auth::user() && Auth::user()->level == 1)
        <div class="col-md-3 mb-3">
            <a href="{{ url('addproduct/') }}" class="btn btn-success btn-block">Add Product</a>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label for="search"  class="col-md-12 col-form-label text-md-left">Search Keyword</label>
                <input type="text" wire:model="search" class="form-control" placeholder="Search..."
                    aria-label="Search">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <label for="min"  class="col-md-12 col-form-label text-md-left" >Search with min harga</label>
                <input type="text" wire:model="min" class="form-control" placeholder="Harga Min..."
                    aria-label="Harga Min">
            </div>
        </div>
        <div class="col-md-4"> 
            <div class="input-group mb-3">
                <label for="max"  class="col-md-12 col-form-label text-md-left">Search with max harga</label>
                <input type="text" wire:model="max" class="form-control" placeholder="Harga Max..."
                    aria-label="Harga Max">
            </div>
        </div>

    </div>

    <section class="products mb-5">
        <div class="row mt-4">
            @foreach ($result as $product)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/upload/' . $product->gambar) }}" style="object-fit:cover"   width="200px" height="270px">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h5><strong>{{ $product->nama }}</strong><small> - {{ $product->berat }} gram</small></h5> 
                                    <h6><strong>Rp. {{ number_format($product->harga) }}</strong></h6>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button class="btn btn-success btn-block"
                                        wire:click="beli({{ $product->id }})">Beli Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


</div>
