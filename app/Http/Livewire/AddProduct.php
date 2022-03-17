<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;



class AddProduct extends Component
{

    public $nama, $harga, $berat, $gambar;
    use WithFileUploads;
    public function mount()
    {
        if (Auth::user()) {
            if (Auth::user()->level !== 1) {
                return redirect()->to('');
            }
        }
    }

    public function store()
    {
        // Validasi
        $this->validate(
            [
                'nama'  => 'required',
                'harga' => 'required',
                'berat' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );


        $file = $this->gambar->store('public/upload'); 
        $image = str_replace('public/upload/','',$file);



        $product = new Product();
        $product->nama = $this->nama;
        $product->harga = $this->harga;
        $product->berat = $this->berat;
        $product->gambar = $image;
        $product->save();

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.addproduct')->extends('layouts.app')->section('content');
    }
}
