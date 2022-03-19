<?php

namespace App\Http\Livewire;

use Kavist\RajaOngkir\RajaOngkir;

use Livewire\Component;
use App\Models\Belanja;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class AddOngkir extends Component
{
    public $cart;
    private $apiKey = 'b997b718cf64c75d98e720a7a21d332c';
    public $provinsi_id, $kota_id, $jasa, $daftarProvinsi, $daftarKota, $nama_jasa;
    public $result = [];





    public function mount($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $this->cart = Belanja::find($id);

        // if ($this->cart->user_id != Auth::user()->id) {
        //     return redirect()->to('');
        // }
    }







    public function getOngkir()
    {
        // jika datanya kosong
        if (!$this->provinsi_id || !$this->kota_id || !$this->jasa) {
            return;
        }

        // Mengambil data produk
        $produk = Product::find($this->cart->produk_id);

        // mengambil biaya ongkir        
        $rajaOngkir = new RajaOngkir($this->apiKey);

        // $this->kota =  $rajaOngkir->kota()->all();
        // dd($this->kota); //cek daftar kota
        $cost = $rajaOngkir->ongkosKirim([
            'origin'        => 108,     // ID kota/kabupaten asal (kab cirebon)
            'destination'   => $this->kota_id,      // ID kota/kabupaten tujuan
            'weight'        => $produk->berat,    // berat barang dalam gram
            'courier'       => $this->jasa    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        // Pengecekan 
        // dd($cost);

        // nama jasa
        $this->nama_jasa = $cost[0]['name'];
        // dd($this->nama_jasa);

        foreach ($cost[0]['costs'] as $row) {
            $this->result[] = array(
                'description'   => $row['description'],
                'biaya'         => $row['cost'][0]['value'],
                'etd'           => $row['cost'][0]['etd']
            );
        }
        // dd($this->result);
    }









    public function save_ongkir($biaya_pengiriman)
    {
        $this->cart->total_harga += $biaya_pengiriman;
        $this->cart->status = 1;
        $this->cart->update();

        return redirect()->to('cart');
    }







    public function render()
    {
        // Semua Provinsi
        $rajaOngkir = new RajaOngkir($this->apiKey);
        // $this->daftarProvinsi = $rajaOngkir->provinsi()->all();
        // dd($this->daftarProvinsi);

        // $rajaOngkir = new RajaOngkir($apiKey);
        // $daftarProvinsi = $rajaOngkir->ongkosKirim([
        //     'origin'        => 155,     // ID kota/kabupaten asal
        //     'destination'   => 80,      // ID kota/kabupaten tujuan
        //     'weight'        => 1300,    // berat barang dalam gram
        //     'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        // ]);
        // dd($daftarProvinsi);




        // $this->provinsi_id = 9; // provisi jabar
        // Daftar kota/kabupaten berdasarkan id provinsinya
        $this->daftarProvinsi = $rajaOngkir->provinsi()->all();

        if ($this->provinsi_id) {
            $this->daftarKota = $rajaOngkir->kota()->dariProvinsi($this->provinsi_id)->get();
            // dd($this->daftarKota); //cek daftar kota dengan profinsi id 9 / jabar
            
        }

        return view('livewire.addongkir')->extends('layouts.app')->section('content');
    }
}
