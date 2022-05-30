<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HeroBiz Bootstrap Template - Home 1</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- midtrans --}}
  <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-y5SiR5ClRTysLV0d"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 

  <!-- Favicons -->
  <link href="{{ asset('tamu/assets-pagetamu/img/favicon.png') }}" rel="icon" >
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
  

  <!-- Vendor CSS Files -->
  {{-- <link href="{{asset('assets-pagetamu/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"  > --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{asset('assets/tamu/assets-pagetamu/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" >
  <link href="{{asset('assets/tamu/assets-pagetamu/vendor/aos/aos.css')}}" rel="stylesheet" >
  <link href="{{asset('assets/tamu/assets-pagetamu/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" >
  <link href="{{asset('assets/tamu/assets-pagetamu/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" >

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{asset('assets/tamu/assets-pagetamu/css/variables.css')}}"  rel="stylesheet">
  {{-- <link href="{{asset('assets/css/variables-blue.css ')}}" rel="stylesheet"> --}}
  <link href="{{asset('assets/tamu/assets-pagetamu/css/variables-green.css')}}" rel="stylesheet"> 
  {{-- <link href="{{asset('assets/css/variables-orange.css')}}" rel="stylesheet">  --}}
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  {{-- <link href="{{asset('assets-pagetamu/css/variables-pink.css ')}}" rel="stylesheet">  --}}

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/tamu/assets-pagetamu/css/main.css')}}"  rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <header id="header" class="header fixed-top " data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <h5>MASJID BAITUSSALAM<span></span></h5>
      </a>
      @include('layouts.tamu.navbar')
      @yield('nav')
      <a class="btn-getstarted scrollto bg-primary" href="{{route('login')}}">Halaman Panitia DKM</a>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
  @include('layouts.tamu.footer')
  @yield('footer')


  @if(session('alert-success'))
    <script>alert('{{session('alert-success')}}')</script>
  @elseif(session('alert-failed'))
    <script>alert('{{session('alert-failed')}}')</script>
  @endif

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="{{asset('assets/tamu/assets-pagetamu/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
  <script src="{{asset('assets/tamu/assets-pagetamu/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/tamu/assets-pagetamu/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/tamu/assets-pagetamu/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/tamu/assets-pagetamu/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/tamu/assets-pagetamu/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="{{asset('assets/tamu/assets-pagetamu/js/main.js')}} "></script>
  
  </body>
  
  </html>