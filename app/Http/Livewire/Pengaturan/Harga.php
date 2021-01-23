<?php

namespace App\Http\Livewire\Pengaturan;

use App\Models\Harga as ModelsHarga;
use Livewire\Component;

class Harga extends Component
{
    public $biaya_admin, $biaya_perawatan, $harga_perkubik;

    public function rules()
    {
        return [
            'biaya_admin' => 'required',
            'biaya_perawatan' => 'required',
            'harga_perkubik' => 'required'
        ];
    }
    public function store()
    {
        $this->validate();
        $harga = ModelsHarga::firstOrCreate(
            [
                'biaya_admin' => $this->biaya_admin,
                'biaya_perawatan' => $this->biaya_perawatan,
                'harga_perkubik' => $this->harga_perkubik
            ]
        );
        $this->reset();
        $this->alert('success', 'Data berhasil disimpan');
    }
    public function render()
    {
        return view('livewire.pengaturan.harga', [
            'harga' => ModelsHarga::latest()->first()
        ]);
    }
}
