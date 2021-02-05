<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Inventaris;
use App\Models\Penggunaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventaris $inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventaris $inventaris)
    {
        //
    }

    public function print($id)
    {

        $penggunaan = Penggunaan::find($id);
        $harga = Harga::latest()->first();
        $data = [
            'id' => $penggunaan->id,
            'tanggal' => $penggunaan->created_at,
            'sumber_dana' => $penggunaan->dataPengguna->nama,
            'no_meter' => $penggunaan->dataPengguna->nomor_meter,
            'alamat' => $penggunaan->dataPengguna->alamat,
            'meter_awal' => $penggunaan->awal_meter,
            'meter_akhir' => $penggunaan->akhir_meter,
            'jumlah_pemakaian' => $penggunaan->pemakaian_kubik,
            'biaya_perawatan' => $harga->biaya_perawatan,
            'biaya_admin' => $harga->biaya_admin,
            'diskon' => $penggunaan->diskon,
            'tagihan' => $penggunaan->tagihan,
            'harga_perkubik' => $harga->harga_perkubik,
            'diskon' => $penggunaan->diskon,
            'total' => $penggunaan->tagihan
        ];
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->stream();
    }
}
