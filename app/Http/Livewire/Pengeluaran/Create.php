<?php

namespace App\Http\Livewire\Pengeluaran;

use App\Models\Pengguna;
use App\Models\Penggunaan;
use Livewire\Component;

class Create extends Component
{
    public $awal_meter,
        $akhir_meter,
        $pemakaian_liter,
        $pemakaian_kubik,
        $biaya_admin,
        $biaya_perawatan,
        $harga_kubik,
        $diskon,
        $tagihan;
    public $pengguna_id;

    protected $listeners = ['penggunaId' => 'getPenggunaId'];

    public function getPenggunaId($id)
    {
        $this->pengguna_id = $id;
    }

    public function store()
    {
        $pengguna = Pengguna::find($this->pengguna_id);
        $penggunaan = new Penggunaan();
        $penggunaan->awal_meter = $this->awal_meter;
        $penggunaan->akhir_meter = $this->akhir_meter;
        $penggunaan->pemakaian_liter = $this->pemakaian_liter;
        $penggunaan->pemakaian_kubik = $this->pemakaian_kubik;
        $penggunaan->biaya_admin = $this->biaya_admin;
        $penggunaan->biaya_perawanan = $this->biaya_perawanan;
        $penggunaan->harga_kubik = $this->harga_kubik;
        $penggunaan->dikson = $this->dikson;
        $penggunaan->tagihan = $this->awal_meter;
    }
    public function render()
    {
        return view('livewire.pengeluaran.create');
    }
}
