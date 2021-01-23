<?php

namespace App\Http\Livewire\Pengguna;

use App\Models\Pengguna;
use Livewire\Component;
use Psy\CodeCleaner\AssignThisVariablePass;

class Index extends Component
{
    public $statusModal = false;
    public $statusUpdate = false;
    public $updatePengeluaran = false;
    public $createPengeluaran = false;
    public $pengguna_id;
    protected $listeners = [
        'berhasilDisimpan' => 'ambilPengguna',
        'confirmed',
        'cancelled',
    ];

    public function ambilPengguna($pengguna)
    {
    }

    public function edit($id)
    {
        $this->statusUpdate = true;
        $this->emit('getPenggunaId', $id);
        $this->emit('updatePengguna');
    }
    public function tambahPengguna()
    {
        $this->emit('tambahPengguna');
        $this->reset();
        // $this->resetErrorBag();
    }
    public function delete($id)
    {

        $this->pengguna_id = $id;
        $this->confirm('Yakin hapus data ini?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Tidak',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {
        $pengguna = Pengguna::find($this->pengguna_id);
        $pengguna->delete();
        $this->alert('success', 'Data berhasil dihapus');
    }

    public function cancelled()
    {
        $this->alert('info', 'Tidak jadi dihapus');
    }

    public function catatPengeluaran($id)
    {
        $this->createPengeluaran = true;
        $this->statusUpdate = false;
        $this->emit('penggunaId', $id);
        $this->emit('modalPengeluaran');
    }
    public function render()
    {
        return view('livewire.pengguna.index', [
            'dataPengguna' => Pengguna::latest()->get()
        ]);
    }
}
