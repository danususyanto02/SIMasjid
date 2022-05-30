<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();

        return view('backend.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product= new Kegiatan;
        $product->judul = $request->judul;
        $product->deskripsi= $request->deskripsi;
        if($request->file('gambar')){
            $file = $request->file('gambar');
            $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());
            $file->move('storage/gambar-kegiatan', $nama_file);
            $product->gambar = $nama_file;
        }
        $product->save();
        return redirect()->route('admin.kegiatan.index');
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
        $gambar = Kegiatan::find($id);
        $lokasigambar = 'storage/gambar-kegiatan/'.$gambar->gambar;
    
        if(file_exists($lokasigambar)){
            unlink($lokasigambar);
            $gambar->delete();
        }
       
        return redirect()->back();
    }
}
