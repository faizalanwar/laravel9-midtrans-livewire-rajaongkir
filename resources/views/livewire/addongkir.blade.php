<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">{{ ('Tambah Ongkir') }}</div>
                <div class="card-body">
                    <form wire:submit.prevent="getOngkir">
                        <label for="provinsi" class="col-md-12 col-form-label text-md-left">{{ ('Silahkan Pilih Provinsi Anda') }}</label>
                        <select name="provinsi" wire:model="provinsi_id" class="form-control">
                            <option value="0">--Pilih Provisi--</option>
                            @forelse ($daftarProvinsi as $p)
                                <option value="{{ $p['province_id'] }}">{{ $p['province'] }}</option>    
                            @empty
                                <option value="0">Provinsi Tidak Ada</option>
                            @endforelse
                        </select>

                        <label for="kota" class="col-md-12 col-form-label text-md-left">{{ ('Silahkan Pilih Kota Anda') }}</label>

                        <select name="kota" wire:model="kota_id" class="form-control">
                            <option value="">--Pilih Kabupaten/Kota--</option>
                            @if ($provinsi_id)
                            @forelse ($daftarKota as $k)
                            <option value="{{ $k['city_id'] }}">{{ $k['type'] }}{{ $k['city_name'] }}</option>
                            @empty
                            <option value="">Pilih Kabupaten/Kota</option>
                            @endforelse    
                            @endif
                        </select>


                        <label for="jasa" class="col-md-12 col-form-label text-md-left">{{ ('Jasa Pengiriman') }}</label>
                        <select name="jasa" wire:model="jasa" class="form-control">
                            <option value="">--Pilih Jasa Pengiriman--</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS Indonesia</option>
                            <option value="tiki">TIKI</option>
                        </select>
                        <br><br>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-block">Lihat Daftar Ongkir</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
        
    @if($result)
    <section class="products mb-5">
        <div class="row mt-4">
            @forelse($result as $r)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div><h5>{{ $nama_jasa }}</h5></div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $r['biaya'] }}</strong></h5>
                                <h6><strong>{{ $r['etd'] }}</strong></h6>
                                <h6><strong>{{ $r['description'] }}</strong></h6>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <button class="btn btn-success btn-block" wire:click="save_ongkir({{ $r['biaya'] }})">Pilih Pengiriman
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    
    
</div>

