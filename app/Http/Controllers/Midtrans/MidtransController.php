<?php

namespace App\Http\Controllers\Midtrans;

use App\Http\Controllers\Controller;
use App\Models\KeuanganMasjid\Donasi\KeuanganDonasi;
use App\Models\KeuanganMasjid\Donasi\PemasukanDonasi;
use App\Models\KeuanganMasjid\Pembangunan\PemasukanMasjid;
use App\Models\Pemasukan;
use App\Models\Pembayaran;
use App\Models\Pembayaran\PembayaranDaring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function payment_handler(Request $request){
        $serverKey = \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        $json = json_decode($request->getContent());


        $signature_key = hash('sha512', $json->order_id.$json->status_code.$json->gross_amount.$serverKey);

        if($signature_key != $json->signature_key){
            return abort(404);
        }
        $notification = new Notification();
        
        $status = $notification->transaction_status;
        $fraud = $notification->fraud_status;


        $order = $notification->fraud_status;
        $order = PembayaranDaring::where('order_id', $json->order_id)->first();

        $byr = DB::table('pembayaran_daring') -> where('order_id', '=', $json->order_id) -> orderBy('id')->first();
      
        $pemasukandonasi = DB::table('pemasukan_donasi_masjid') -> where('id', '=', $byr -> id) -> orderBy('id')->first();
        
        $nominalsebelumnya = DB::table('pembayaran_daring')->latest('id')->first();

        $nominalpemasukandonasisebelumnya = DB::table('pemasukan_donasi_masjid')->latest('id')->first();
      

        if ($order)
        {

            if ($status == 'settlement')
            {

                $order -> update(['status'=>$json->transaction_status]);


                if($byr -> jenis == 'pembangunan'){
                    $pemasukan = new PemasukanMasjid();
                    // $pemasukan->nama = $byr -> nama;
                    $pemasukan ->total  = $byr -> gross_amount + $nominalsebelumnya ->gross_amount;
                    $pemasukan->id_bayardaring   = $byr -> id;
                    $pemasukan -> save();

                }elseif($byr -> jenis == 'donasi'){
                  
                    $pemasukandonasi = new PemasukanDonasi();
                    // $pemasukan->nama = $byr -> nama;
                    $pemasukandonasi ->total  = $byr -> gross_amount + $nominalpemasukandonasisebelumnya ->total;
                    $pemasukandonasi->id_bayardaring = $byr -> id;
                    $pemasukandonasi -> save();
                    $keuangandonasi = new KeuanganDonasi();
                    $keuangandonasi -> id_pemasukan = $pemasukandonasi -> id;
                    $keuangandonasi -> save();
                }


                
                // $order -> update(['status'=>$json->transaction_status]);
                // $pemasukan = new Pemasukan();
                // // $pemasukan->nama = $byr -> nama;
                // $pemasukan->pembayaran_id = $byr -> id;
                // $pemasukan -> save();

            }
            else if ($status == 'success')
            {
                
                // $order -> update(['status'=>$json->transaction_status]);
                // $pemasukan = new Pemasukan();
                // $pemasukan->nama ='asdsad';
                // $pemasukan->pembayaran_id = '188';
                // $pemasukan -> save();
               
            }
            else if($status == 'capture' && $fraud == 'challenge' )
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }

      

        
        
        // $bayaran = $order -> nama;
        // $idbayaran = $order -> id;

        // $validatedData = $request->validate([
        // 'id' => '141',
        // 'nama' => 'asdsadsa',
        // ]);
        // Pemasukan::create($validatedData);

        // if($order->status == 'settlement' ) {
        //         $pembayaran = Pembayaran::where('order_id', $json->order_id)->first();
        //         $bayaran = $pembayaran -> nama;
        //         $idbayaran = $pembayaran -> id;
        //         $pemasukan = new Pemasukan([
        //             'nama' => $bayaran -> nama,
        //             'pembayaran_id' => $idbayaran-> id,
        //         ]);
        //         $pemasukan -> save();
            
        // }


       
         
    }

    public function callback(Request $request){
        //Set configurasi midtrans
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        //Instance midtrans notification
        $notification = new Notification();

        //Assign ke variable
        $status =  $notification->transaction_status ;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        //Mencari berdasarkan ID
        $transaction = PembayaranDaring::findOrFail($order_id);


        //Handle notifikasi status midtrans
        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';

                }
            }else{
                $transaction->status = 'SUCCESS';
            }
        }elseif($status == 'settlement'){
            $transaction->status ='SUCCESS';
        }elseif($status == 'pending'){
            $transaction->status ='PENDING';
        }elseif($status == 'deny'){
            $transaction->status ='CANCELLED';
        }elseif($status == 'expire'){
            $transaction->status ='CANCELLED';
        }elseif($status == 'cancel'){
            $transaction->status ='CANCELLED';
        }

                


        //Simpan Transaksi
        $transaction->save();
    
    }

    public function success(){
        return view('midtrans.success');
    }
    public function unfinish(){
        return view('midtrans.unfinish');
    }
    public function error(){
        return view('midtrans.error');
    }

}
