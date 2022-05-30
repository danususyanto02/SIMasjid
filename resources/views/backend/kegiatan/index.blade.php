@extends('layouts.admin')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            
            <a href="{{route('admin.kegiatan.create')}}" class="btn btn-success btn-icon-split">
                <span class="text">Buat Kegiatan Baru</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center" >Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th class="text-center" >Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kegiatan as $urut => $item)
                        <tr>
                            <td>{{++$urut}}</td>
                            <td class="text-center">
                                <img src="{{ url('storage/gambar-kegiatan',$item->gambar) }}" width="500px" alt="" title="{{$item->judul}}">
                            <td>{{$item->judul}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td> <div class="d-flex justify-content-center">
                               
                            <form method="post" action=" {{route('admin.kegiatan.destroy',$item->id)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-destroy mr-2" >Hapus</button>
                            </form>
                            <a class="btn btn-secondary mr-2" href="#">Edit</a>
                                
                            </div>
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection