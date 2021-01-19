<?php

namespace App\Http\Livewire\Pengguna;

use App\Models\Pengguna;
use Livewire\Component;

class Update extends Component
{
    public $nomor_meter, $nama, $telepon, $alamat, $pengguna_id;

    protected $listeners = [
        'getPenggunaId' => 'getId'
    ];



    public function getId($id)
    {
        $pengguna = Pengguna::find($id);
        $this->pengguna_id = $pengguna->id;
        $this->nomor_meter = $pengguna->nomor_meter;
        $this->nama = $pengguna->nama;
        $this->telepon = $pengguna->telepon;
        $this->alamat = $pengguna->alamat;
    }


    public function rules()
    {
        return [
            'nomor_meter' => 'required',
            'nama' => 'required|string',
            'telepon' => 'string',
            'alamat' => 'required|string'
        ];
    }
    public function update()
    {
        $this->validate();
        $pengguna = Pengguna::find($this->pengguna_id);
        $pengguna->nomor_meter = $this->nomor_meter;
        $pengguna->nama = ucwords($this->nama);
        $pengguna->telepon  = $this->telepon;
        $pengguna->alamat = ucwords($this->alamat);
        $pengguna->save();
        $this->alert('success', 'Data Berhasil Diperbarui');
        $this->emit('closeModal');
        $this->emit('berhasilDisimpan', $pengguna);
    }
    public function render()
    {
        return view('livewire.pengguna.update');
    }
}
