<?php

namespace App\Http\Controllers\Backend\KurbanKolektif;

use App\Http\Controllers\Controller;
use App\Models\KolektifKurban\PembayaranKolektif;
use Illuminate\Http\Request;

class PembayaranKolektifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = PembayaranKolektif::all();
        $pesertabayar = PembayaranKolektif::select('users.*')
        ->leftjoin('user_field_data', function($query) {
       return $query->on('users.id', 'user_field_data.user_id')->where('user_field_data.field_id', 23);
       })->orderBy('user_field_data.value', $direction)->get();

        return view('backend.kolektif.pembayarankolektif.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kolektif.pembayarankolektif.create');
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
