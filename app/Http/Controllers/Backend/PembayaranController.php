<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pembayaran\PembayaranDaring;
use Exception;
use Illuminate\Http\Request;
use Midtrans\Config;
use PhpParser\Node\Stmt\TryCatch;
use Midtrans\Snap;

class PembayaranController extends Controller
{
        public function index(){
            return view('amal');
    }

    // public function checkout(Request $request){
    //     $order = new Pembayaran();
    //     $order->nama = $request->get('nama');
    //     $order->email = $request->get('email');
    //     $order->number = $request->get('number');
    //     $order->payment_url = '';
    //     $order->save();

    //     //Konfigurasi
    //     \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
    //     \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
    //     \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
    //     \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

    //     //Membuat Transaksi
    //     $order = Pembayaran::find($order->id);

    //     //Memanggil midtrans
    //     $midtrans = [
    //         'transaction_details' => [
    //             'payment_id' => $order->id,
    //             'gross_amount' => 10000,
    //         ],
    //         'customer_details' => [
    //             'first_name' => $request->get('nama'),
    //             'last_name' => '',
    //             'email' => $request->get('email'),
    //             'phone' => $request->get('number'),
    //         ],
    //         'enable_payments' => [
    //             'gopay',
    //             'bank_transfer'
    //         ],
    //         'vtweb'=>[]
            
    //     ];

    //     //memanggil midtrans
    //     try{
    //         //Mengambil halaman payment midtrans
    //         $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
    //         $order->payment_url = $paymentUrl;
    //         $order->save();

    //         return view('welcome')->with('success');
    //     }catch(Exception $e){
    //         return view('welcome')->with('failed');
    //     }

    //     //Mengembalikan Data ke Api

    // }


    public function payment(Request $request){


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-vGigHbNEbjFiv3PPPA43E1Wr';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => $request->get('nama'),
                'last_name' => '',
                'email' => $request->get('email'),
                'phone' => $request->get('number'),
            ),
            'item_details' => array(
                [
                    "id"=> "a01",
                    "price"=> 7000,
                    "quantity"=> 1,
                    "name"=> "Apple"
                ],
                [
                    "id"=>  "b02",
                    "price"=> 3000,
                    "quantity"=>  2,
                    "name"=>  "Orange"
                ]
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('midtrans.snap' , ['snapToken'=>$snapToken]);
    }

    public function payment_post(Request $request){


        // return $request;

        $json = json_decode($request->get('json'));
        $order = new PembayaranDaring();
        $order->token = $request->get('_token');
        $order->transaction_id =  isset($json->transaction_id) ? $json->transaction_id : null;;
        $order->nama = $request->get('nama');
        $order->jenis = $request->get('pilih');
        $order->email = $request->get('email');
        $order->number = $request->get('number');
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->status = $json->transaction_status;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $order->save();

        return redirect(url('/'));
    }
}
