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
        $setHarga = Harga::latest()->first();
        $meterAwal = Penggunaan::where('pengguna', $this->penggunan_id->pengguna)->latest()->first();
        if (empty($meterAwal)) {
            $meterAwal = 0;
        } else {
            $meterAwal = $meterAwal->akhir_meter;
        }
        $pemakaian = ($this->akhir_meter - $meterAwal);
        $pemakaianKubik = $pemakaian / 1000;
        $penggunaan = Penggunaan::find($this->penggunan_id);
        $penggunaan->awal_meter = $meterAwal;
        $penggunaan->akhir_meter = $this->akhir_meter;
        $penggunaan->pemakaian_liter = $pemakaian;
        $penggunaan->pemakaian_kubik = $pemakaianKubik;
        $penggunaan->biaya_admin = $setHarga->biaya_admin;
        $penggunaan->biaya_perawatan = $setHarga->biaya_perawatan;
        $penggunaan->harga_kubik = $setHarga->harga_kubik;
        $penggunaan->diskon = $this->diskon;
        $penggunaan->tagihan = ($pemakaian * $setHarga->biaya_perkubik) + $setHarga->biaya_admin + $setHarga->biaya_perawatan - $this->diskon;
        $penggunaan->pengguna = $meterAwal->pengguna;
        $penggunaan->save();
        $this->reset(['akhir_meter', 'diskon']);
        $this->alert('success', 'Data Berhasil Disimpan');
        session()->flash('message', 'Data berhasil disimpan');
    }


    public function render()
    {
        return view('livewire.pengeluaran.update');
    }
}
