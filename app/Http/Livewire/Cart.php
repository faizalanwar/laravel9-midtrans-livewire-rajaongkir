<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Belanja;

use Livewire\Component;

class Cart extends Component
{

    public $belanja = [];

    public function mount()
    {
        // Auth
        if (!Auth::user()) {
            return redirect()->route('login');
        }
    }


    public function destroy($pesanan_id)
    {
        $pesanan = Belanja::find($pesanan_id);
        $pesanan->delete();
    }

    public function render()
    {
        // Auth
        if (Auth::user()) {
            $this->belanja = Belanja::where('user_id', Auth::user()->id)->get();
        }
        return view('livewire.cart')->extends('layouts.app')->section('content');
    }
}
