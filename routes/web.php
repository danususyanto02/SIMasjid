<?php

use Backend\DonasiController;

use Backend\KurbanKolektif\PesertaKolektifController;

//Donasi
use Backend\UangDonasi\PemasukanDonasiController;
use Backend\UangDonasi\PengeluaranDonasiController;


use Backend\KegiatanController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Backend\PembayaranController;

use Backend\PembayaranLuringController;
use Backend\KurbanKolektif\PembayaranKolektifController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/amal', [PembayaranController::class, 'index']);
Route::get('/payment', [PembayaranController::class, 'payment']);
Route::post('/payment', [PembayaranController::class, 'payment_post']);





Auth::routes();



Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');



Route::group(['middleware'=>'auth'], function(){

   
    Route::group(['middleware' => 'admin','prefix'=>'admin','as'=>'admin.'], function(){
	
      Route::get('/home', [ HomeController::class,'index'])->name('home');
      // Route::resource('/kegiatan', KegiatanController::class);
      Route::resource('kegiatan', KegiatanController::class);
      Route::resource('peserta-kolektif', PesertaKolektifController::class);
      Route::resource('pembayaran-kolektif', PembayaranKolektifController::class);
      Route::resource('donasi', DonasiController::class);
      Route::resource('pemasukandonasi', PemasukanDonasiController::class);
      Route::resource('pengeluaranandonasi', PengeluaranDonasiController::class);
      Route::resource('pembayaranluring', PembayaranLuringController::class);
    });

    Route::group(['middleware' => 'panitia','prefix'=>'panitia','as'=>'panitia.'], function(){
		Route::get('/home', [ HomeController::class,'index'])->middleware('can:panitia')->name('home');
    // Route::resource('kegiatan', KegiatanController::class);
    });
});