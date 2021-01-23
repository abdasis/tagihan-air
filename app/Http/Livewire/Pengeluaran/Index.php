<?php

namespace App\Http\Livewire\Pengeluaran;

use App\Models\Pengguna;
use App\Models\Penggunaan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $penggunaan = Penggunaan::latest()->get();
        return view('livewire.pengeluaran.index', [
            'dataPenggunaan' => $penggunaan
        ]);
    }
}
