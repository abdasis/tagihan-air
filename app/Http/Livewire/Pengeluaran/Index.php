<?php

namespace App\Http\Livewire\Pengeluaran;

use App\Models\Pengguna;
use App\Models\Penggunaan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Index extends Component
{
    public function update($id)
    {
        $this->emit('modalEdit');
        $this->emit('pengguna_id', $id);
    }

    public function print($id)
    {

        return response()->streamDownload(function () {
            $pdf = PDF::loadView('pdf.invoice');
            $pdf->loadHTML('<h1>Test</h1>');
            echo $pdf->stream();
        }, 'test.pdf');
        // $penggunaan = Penggunaan::find($id);
        // // dd($penggunaan);
        // $pdf = PDF::loadView('pdf.invoice');
        // return $pdf->download('invoice.pdf');
        // return $pdf->stream();
    }
    public function render()
    {
        $penggunaan = Penggunaan::latest()->get();
        return view('livewire.pengeluaran.index', [
            'dataPenggunaan' => $penggunaan
        ]);
    }
}
