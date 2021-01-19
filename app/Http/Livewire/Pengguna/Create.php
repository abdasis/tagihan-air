<?php

namespace App\Http\Livewire\Pengguna;

use App\Models\Pengguna;
use Livewire\Component;

class Create extends Component
{
    public $nomor_meter, $nama, $telepon, $alamat;

    public function rules()
    {
        return [
            'nomor_meter' => 'required|unique:penggunas',
            'nama' => 'required|string',
            'telepon' => 'string',
            'alamat' => 'required|string'
        ];
    }
    public function store()
    {
        $this->validate();
        $pengguna = new Pengguna();
        $pengguna->nomor_meter = $this->nomor_meter;
        $pengguna->nama = ucwords($this->nama);
        $pengguna->telepon  = $this->telepon;
        $pengguna->alamat = ucwords($this->alamat);
        $pengguna->save();
        $this->alert('success', 'Data Berhasil Disimpan');
        $this->emit('closeModal');
        $this->emit('berhasilDisimpan', $pengguna);
    }
    public function render()
    {
        return view('livewire.pengguna.create');
    }
}
