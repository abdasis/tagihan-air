<?php

namespace App\Http\Livewire\Pengeluaran;

use App\Models\Harga;
use App\Models\Pengguna;
use App\Models\Penggunaan;
use Livewire\Component;

class Create extends Component
{
    public $meter_awal,
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
        $this->reset();
        $this->pengguna_id = $id;
    }

    public function store()
    {
        $pengguna = Pengguna::find($this->pengguna_id);
        $setHarga = Harga::latest()->first();
        $meterAwal = Penggunaan::where('pengguna', $pengguna->id)->latest()->first();
        $penggunaan = Penggunaan::wherePengguna($pengguna->id)->whereMonth('created_at', date('m'))->latest()->get();

        if ($meterAwal->akhir_meter < $meterAwal->awal_meter) {
            $this->alert('error', 'Maaf!', [
                'text' => 'Meter akhir tidak boleh lebih kecil dari meter awal',
                'toast' => false,
                'position' => 'center'
            ]);
            return;
        }

        if (empty($meterAwal)) {
            $meterAwal = 0;
        } else {
            $meterAwal = $meterAwal->akhir_meter;
        }


        if (count($penggunaan) > 0) {
            $this->alert('error', 'Maaf!', [
                'text' => 'Pelanggan Sudah Melakukan Pembayaran Bulan Ini',
                'toast' => false,
                'position' => 'center'
            ]);
            return;
        }

        $pemakaian = ($this->akhir_meter - $meterAwal);
        $pemakaianKubik = $pemakaian / 1000;
        $penggunaan = new Penggunaan();
        $penggunaan->awal_meter = $meterAwal;
        $penggunaan->akhir_meter = $this->akhir_meter;
        $penggunaan->pemakaian_liter = $pemakaian;
        $penggunaan->pemakaian_kubik = $pemakaianKubik;
        $penggunaan->biaya_admin = $setHarga->biaya_admin;
        $penggunaan->biaya_perawatan = $setHarga->biaya_perawatan;
        $penggunaan->harga_kubik = $setHarga->harga_perkubik;
        $penggunaan->diskon = $this->diskon;
        $penggunaan->tagihan = ($pemakaianKubik * $setHarga->harga_perkubik) + $setHarga->biaya_admin + $setHarga->biaya_perawatan - $this->diskon;
        $penggunaan->pengguna = $pengguna->id;
        $penggunaan->save();
        $this->reset(['akhir_meter', 'diskon']);
        $this->alert('success', 'Data Berhasil Disimpan');
        session()->flash('message', 'Data berhasil disimpan');
    }
    public function render()
    {
        return view('livewire.pengeluaran.create');
    }
}
