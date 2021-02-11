<?php

namespace App\Http\Livewire\Pengeluaran;

use App\Models\Harga;
use App\Models\Pengguna;
use App\Models\Penggunaan;
use Livewire\Component;

class Update extends Component
{
    public $penggunan_id;
    public $meter_awal,
        $akhir_meter,
        $pemakaian_liter,
        $pemakaian_kubik,
        $biaya_admin,
        $biaya_perawatan,
        $harga_kubik,
        $diskon,
        $tagihan,
        $pengguna;
    protected $listeners = [
        'pengguna_id' => 'getPengguna'
    ];

    public function getPengguna($id)
    {
        $this->penggunan_id = Penggunaan::find($id);
    }

    public function update()
    {
        // dd($this->penggunan_id->pengguna);
        $setHarga = Harga::latest()->first();
        $meterAwal = Penggunaan::where('pengguna', $this->penggunan_id->pengguna)->latest()->first();
        if (empty($meterAwal)) {
            $meterAwal = 0;
        } else {
            $meterAwal = $meterAwal->akhir_meter;
        }

        $penggunaan = Penggunaan::find($this->penggunan_id->id);
        $pemakaian = ($this->akhir_meter - $penggunaan->awal_meter);
        $pemakaianKubik = $pemakaian / 1000;
        $penggunaan->awal_meter = $penggunaan->awal_meter;
        $penggunaan->akhir_meter = $this->akhir_meter;
        $penggunaan->pemakaian_liter = $pemakaian;
        $penggunaan->pemakaian_kubik = $pemakaianKubik;
        $penggunaan->biaya_admin = $setHarga->biaya_admin;
        $penggunaan->biaya_perawatan = $setHarga->biaya_perawatan;
        $penggunaan->harga_kubik = $setHarga->harga_perkubik;
        $penggunaan->diskon = $this->diskon;
        $penggunaan->tagihan = ($pemakaianKubik * $setHarga->harga_perkubik) + $setHarga->biaya_admin + $setHarga->biaya_perawatan - $this->diskon;
        $penggunaan->pengguna = $this->penggunan_id->pengguna;
        $penggunaan->save();
        $this->reset(['akhir_meter', 'diskon']);
        $this->alert('success', 'Data Berhasil update');
        session()->flash('message', 'Data berhasil update');
    }


    public function render()
    {
        return view('livewire.pengeluaran.update');
    }
}
