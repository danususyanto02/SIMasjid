
@extends('layouts.tamu.app')

@section('content')
<section class="contact ">

<div style="" class="container py-5 py-10 px-5 align-items-center">
  <form action="/payment" method="GET"  enctype="multipart/form-data">
    
    <div class="row">
      <div class="col-md-6 form-group">
        <input name="nama" type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="Nama">
      </div>
      <div class="col-md-6 form-group mt-3 mt-md-0">
        <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email">
      </div>
    </div>

    <div class="form-group mt-3">
      <input name="number" type="number" class="form-control" id="number" aria-describedby="number" placeholder="number">
    </div>

    <div class="form-group mt-3">
      <select class=" form-select  text " name="pilih" aria-label=".form-select-lg example">
        <option value="pembangunan">Pembangunan Masjid</option>
        <option value="donasi">Dhuafa & Yatim Piatu</option>
      </select>
    </div>  
    {{-- <div class="form-group mt-3">
      <textarea class="form-control" name="message" placeholder="Item" required=""></textarea>
    </div>

    <div class="my-3">
      <div class="loading">Loading</div>
      <div class="error-message"></div>
      <div class="sent-message">Your message has been sent. Thank you!</div>
    </div> --}}
    <div class="text-center"><button class="mt-4 btn btn-success" type="submit">Selanjutnya</button></div>
  </form>
  
</div>
</section>

@endsection