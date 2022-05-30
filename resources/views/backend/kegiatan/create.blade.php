{{-- <form action="{{route('')}}" enctype="multipart/form-data">


    <div class="form-group">
        <label for="n">Judul</label>
      <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
        <label for="n">Deskripsi</label>
      <input type="text" name="deskripsi" class="form-control" id="exampleFormControlInput1" >
    </div>
    <button type="submit" class="btn btn-primary btn-store">Simpan</button>
  </form> --}}
  
  {{-- <form class="text-center  p-4" action="{{ route('admin.kegiatan.store') }}" method = "POST" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">deskripsi</label>
        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="deskripsi">
    </div>
     <button class="btn btn-primary" type="submit">Button</button>
    </form> --}}

@extends('layouts.admin')

@section('main-content')

<div class="col-lg-12 order-lg-1">
  <div class="card shadow mb-4">

      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kegiatan</h6>
      </div>

      <div class="card-body">

          <form method="POST" action="{{ route('admin.kegiatan.store') }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <h6 class="heading-small text-muted mb-4">Tambah Kegiatan Baru</h6>

              <div class="pl-lg-4">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group focused">
                              <label class="form-control-label" for="name">Gambar<span class="small text-danger">*</span></label>
                              <input required type="file" class="form-control" id="gambar" name="gambar">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group focused">
                              <label class="form-control-label" for="judul">Judul</label>
                              <input required type="text" id="judul" class="form-control" name="judul" ">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label class="form-control-label" for="email">Deskripsi<span class="small text-danger">*</span></label>
                              <input required type="text" id="deskripsi" class="form-control" name="deskripsi" >
                          </div>
                      </div>
                  </div>

              </div>

              <!-- Button -->
              <div class="pl-lg-4">
                  <div class="row">
                      <div class="col text-center">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </div>
              </div>
          </form>

      </div>

  </div>
</div>

@endsection