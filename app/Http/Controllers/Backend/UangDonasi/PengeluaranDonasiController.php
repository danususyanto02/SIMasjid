<?php

namespace App\Http\Controllers\Backend\UangDonasi;

use App\Http\Controllers\Controller;
use App\Models\KeuanganMasjid\Donasi\KeuanganDonasi;
use App\Models\KeuanganMasjid\Donasi\PengeluaranDonasi;
use Illuminate\Http\Request;

class PengeluaranDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.donasi.createpengeluarandonasi');
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
        $pengeluaran = new PengeluaranDonasi();
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->nominal =  $request->nominal;
        $pengeluaran->save();
        $keuangandonasi = new KeuanganDonasi([
            'id_pengeluaran' => $pengeluaran->id,
        ]);
        $keuangandonasi->save();
        return redirect()->route('admin.donasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
