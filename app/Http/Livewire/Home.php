<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $products = [];
    public $search, $min, $max;
    public function render()
    {
        if ($this->max) {
            $harga_max = $this->max;
        } else {
            $harga_max = 50000000000;
        }

        // Filter harga min
        if ($this->min) {
            $harga_min = $this->min;
        } else {
            $harga_min = 0;
        }

        // Filter Search

        if ($this->search) {
            $this->products = Product::where('nama', 'like', '%' . $this->search . '%')->where('harga', '>=', $harga_min)->where('harga', '<=', $harga_max)->get();
            $result = $this->products;
        } else {
            $this->products = Product::where('harga', '>=', $harga_min)->where('harga', '<=', $harga_max)->get();
            $result = $this->products;
        }

        // $this->product = Product::all();
        // $result = $this->product;

        return view('livewire.home', compact('result'))->extends('layouts.app')->section('content');
    }
}
