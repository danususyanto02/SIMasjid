@extends('layouts.admin')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">




    <div class="card shadow mb-4">
        

    <div class="card-header py-3 text-center">
        <ul class="list-group  ">
            <li class="list-group-item list-inline text-center d-flex justify-content-center align-items-center">        
                <a href="{{route('admin.pemasukandonasi.index')}}" class="btn btn-success btn-icon-split">
                    <span class="text">Masukkan Data Pemasukan</span>
                </a>
               &nbsp;
               &nbsp;
               &nbsp;
                <a href="{{route('admin.pengeluaranandonasi.index')}}" class="btn btn-secondary btn-icon-split ">
                    <span class="text">Masukkan Data Pengeluaran </span>
                </a>
            </li>
          </ul>
            
    </div>
    </div>
    <div class="center">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pemasukan (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{"Rp " . number_format($nominal ?? "0", 2, ",", "."); }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pengeluaran (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{"Rp " . number_format($totalpengeluaran ?? "0", 2, ",", "."); }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    
        </div>
    </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="card bg-primary     ">
            <div class="card-body">
                <h4 class="text-center text-white">Pemasukan</h4>
            </div>
          </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datapemasukan" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-center">Keterangan</th>
                        <th>Nominal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th class="text-center">Keterangan</th>
                        <th>Nominal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pemasukandonasi as $urut => $item)
                    <tr>
                        <td>{{++$urut}}</td>
                        <td>{{$item->pemasukan_donasi_daring['keterangan'] ?? $item->pemasukan_donasi_luring['keterangan'] ?? ''}}</td>
                        <td>{{$item->pemasukan_donasi_daring->gross_amount ?? $item->pemasukan_donasi_luring->nominal ?? ''}}</td>
                        <td> <div class="d-flex justify-content-center">
                        <form method="post" action=" {{route('admin.donasi.destroy',$item->id)}}">
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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="card bg-primary     ">
            <div class="card-body">
                <h4 class="text-center text-white">Pengeluaran</h4>
            </div>
          </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datapengluaran" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-center" >Keterangan</th>
                        <th>Nominal</th>
    
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th class="text-center" >Keterangan</th>
                        <th>Nominal</th>

                        <th class="text-center">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pengeluarankandonasi as $urut => $item)
                    <tr>
                        <td>{{++$urut}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>{{$item->nominal}}</td>
                        <td> <div class="d-flex justify-content-center">
                           
                        <form method="post" action=" {{route('admin.donasi.destroy',$item->id)}}">
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