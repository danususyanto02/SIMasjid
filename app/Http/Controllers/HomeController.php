<?php

namespace App\Http\Controllers;

use App\Models\KeuanganMasjid\Donasi\KeuanganDonasi;
use App\Models\KeuanganMasjid\Donasi\PemasukanDonasi;
use App\Models\KeuanganMasjid\Donasi\PengeluaranDonasi;
use App\Models\Pembayaran\PembayaranLuring;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        $users = User::count();
        
        // $pemasukan = KeuanganDonasi::orderBy('id_pemasukan')->sum('pemasukan');
        // $pemasukan = KeuanganDonasi::orderBy('id_pemasukan')->sum('pemasukan');
        // $pemasukan =     KeuanganDonasi::where('pemasukan-pengeluaran ');
        // ->whereRaw('Nilai_Faktur-Nilai_Bayar > 0')
        // ->select('Nilai_Faktur','Tgl_Faktur','Lama_Piutang','No_Faktur','Nilai_Bayar')
        // ->get();

        // $grafikpemasukandonasi = KeuanganDonasi::select(DB::raw("CAST(SUM(pemasukan) as int ) as pemasukan"))
        //                     ->GroupBy(DB::raw("Month(created_at)"))->get('pemasukan');
       

         //yang bener
        // $masuk = KeuanganDonasi::orderBy('id_pemasukan')->sum('pemasukan');
        // $keluar = KeuanganDonasi::orderBy('id_pengeluaran')->sum('pengeluaran');
        // $totaldonasi = $masuk - $keluar;
     
        //yang bener
        // $grafikpemasukandonasi = DB::table('keuangan_donasi_masjid')
        // ->selectRaw('month(created_at) as month')
        // ->selectRaw('sum(pemasukan) as count')
        // ->groupBy('month')

        // ->pluck('count');

    
        // $grafikpemasukandonasi = KeuanganDonasi::select(DB::raw("SUM(pemasukan) as count"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->pluck('count');

        
        
    

    // $grafikbulanpemasukandonasi = DB::table('keuangan_donasi_masjid')
    // ->selectRaw('MONTHNAME(created_at) as month')

    // ->groupBy('month')

    // ->pluck('month');

        $grafikbulanpemasukandonasi = KeuanganDonasi::select(DB::raw("MONTHNAME(created_at) as bulan"))
                            ->GroupBy(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');


        
        // $grafikbulanpemasukandonasi = KeuanganDonasi::select(DB::raw("MONTHNAME(created_at) as bulan"))
        //                     ->GroupBy(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');
                            

        // $grafikpemasukandonasi = []
        

        //total donasi
                //Pemasukan
                $total = PemasukanDonasi::get(['id_bayarluring']);
                $pemasukanluring = PembayaranLuring::find($total);
                $nominal = $pemasukanluring->map->only(['nominal'])->sum('nominal'); 
        
                //Pengeluaran
                $totalpengeluaran = PengeluaranDonasi::get(['nominal'])->sum('nominal'); 
                
                $totaldonasi =  $nominal - $totalpengeluaran  ;

                       
        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget','totaldonasi'));
        //'totaldonasi','grafikpemasukandonasi','grafikbulanpemasukandonasi'
    }
}
