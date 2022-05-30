@extends('layouts.admin')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- {{route('admin.kegiatan.create')}} --}}
            <a href="" class="btn btn-success btn-icon-split">
                <span class="text">Buat Peserta Koletif Baru Baru</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center" >Nama</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th class="text-center" >Nama</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($peserta as $urut => $item)
                        <tr>
                           
                            <td>{{++$urut}}</td>
                            <td class="text-center">{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->nohp}}</td>
                            <td> <div class="d-flex justify-content-center">
                                {{-- {{route('admin.kegiatan.destroy',$item->id)}} --}}
                            <form method="post" action="">
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