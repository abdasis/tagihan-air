<?php

namespace App\Http\Livewire\Inventaris;

use App\Models\Inventaris;
use App\Models\Pengeluaran;
use Livewire\Component;

class Index extends Component
{
    public $nama_barang, $jumlah, $harga_satuan;
    public $pengeluaran;
    public $update = false;

    protected $listeners = [
        'confirmed',
        'canceled'
    ];
    public function update($id)
    {
        $pengeluaran = Inventaris::find($id);
        $this->nama_barang = $pengeluaran->nama_barang;
        $this->jumlah = $pengeluaran->jumlah;
        $this->harga_satuan = $pengeluaran->harga_satuan;
        $this->pengeluaran = $pengeluaran;
        $this->update = true;
    }
    public function store()
    {
        if ($this->update) {
            $pengeluaran = Inventaris::where('id', $this->pengeluaran->id)
                ->update(
                    [
                        'nama_barang' => $this->nama_barang,
                        'jumlah' => $this->jumlah,
                        'harga_satuan' => $this->harga_satuan,
                        'jumlah_total' => ($this->jumlah * $this->harga_satuan),
                    ]
                );

            $this->reset();
        } else {

            $pengeluaran = Inventaris::create(
                [
                    'nama_barang' => $this->nama_barang,
                    'jumlah' => $this->jumlah,
                    'harga_satuan' => $this->harga_satuan,
                    'jumlah_total' => ($this->jumlah * $this->harga_satuan),
                ]
            );
        }

        if ($pengeluaran) {
            $this->alert('success', 'Data berhasil di tambahkan');
        }
    }

    public function delete($id)
    {
        $this->pengeluaran = Inventaris::find($id);
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
        $this->pengeluaran->delete();
        $this->alert('success', 'Data berhasil dihapus');
    }

    public function canceled()
    {
        return;
    }
    public function render()
    {
        $dataPengeluaran = Inventaris::whereMonth('created_at', date('m'))->get();
        return view('livewire.inventaris.index', [
            'dataPengeluaran' => $dataPengeluaran,
        ]);
    }
}
