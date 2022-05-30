<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KeuanganMasjid\Donasi\KeuanganDonasi;
use App\Models\KeuanganMasjid\Donasi\PemasukanDonasi;
use App\Models\KeuanganMasjid\Donasi\PengeluaranDonasi;
use App\Models\Pemasukan;
use App\Models\Pembayaran\PembayaranLuring;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $donasi = KeuanganDonasi::get();

        $donasipemasukan = KeuanganDonasi::get(['id_pemasukan']);
        $pemasukandonasi = PemasukanDonasi::find($donasipemasukan);
        // $result = array_filter($pemasukandonasi);

        $donasipengeluaran = KeuanganDonasi::get(['id_pengeluaran']);
        $pengeluarankandonasi = PengeluaranDonasi::find($donasipengeluaran);


        //Pemasukan
        $total = PemasukanDonasi::get(['id_bayarluring']);
        $pemasukanluring = PembayaranLuring::find($total);
        $nominal = $pemasukanluring->map->only(['nominal'])->sum('nominal'); 

        //Pengeluaran
        $totalpengeluaran = PengeluaranDonasi::get(['nominal'])->sum('nominal'); 

        return view('backend.donasi.index',compact('pemasukandonasi','nominal','pengeluarankandonasi','totalpengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend\donasi\createpemasukandonasi');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datapengeluaran()
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
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
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
        // Keuangan Donasi
        $pemasukandonasi = PemasukanDonasi::find($id);
        $iddatapemasukandonasi = $pemasukandonasi -> keuangan_donasi_masjid->id;
       
        $keuangan = KeuanganDonasi::find($iddatapemasukandonasi);

        $pemasukanluring = $pemasukandonasi->id_bayarluring;
        $pemasukanluringdonasi = PembayaranLuring::find($pemasukanluring);



        $keuangan->delete();
        $pemasukanluringdonasi->delete();
        $pemasukandonasi->delete();
        

       
        
        return redirect()->back();
    }
}
