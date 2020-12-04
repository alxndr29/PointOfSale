@extends('admin.header')

@section('content')
<!-- /.col (left) -->

<div class="col mt-3">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Pelanggan</h3>
                </div>
                <form method="post" action="{{ route('pelangganstore') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namapelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="namapelanggan" placeholder="Masukan Nama Pelanggan" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamatpelanggan">Alamat Pelanggan</label>
                            <input type="text" class="form-control" id="alamatpelanggan" placeholder="Masukan Alamat Pelanggan" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="teleponpelanggan">Telepon Pelanggan</label>
                            <input type="text" class="form-control" id="teleponpelanggan" placeholder="Masukan Telepon Pelanggan" name="telepon">
                        </div>
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Master Pelanggan</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->

                            <div class="card-body table-responsive text-center">
                                <table class="table table-head-fixed text-nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>           
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th> Edit </th>
                                            <th> Hapus </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pelanggan as $key => $value)
                                        <tr>
                                            <td>{{$pelanggan->firstItem() + $key }}</td>
                                            
                                            <td>{{$value->nama}}</td>
                                            <td>{{$value->alamat}}</td>
                                            <td>{{$value->telepon}}</td>
                                            <td><a class="btn btn-block btn-success btn-sm" href="{{route('pelangganedit',$value->id)}}">Edit</a></td>

                                            <td>
                                                <a href="javascript:void(0)" id="hapuspelanggan" name="hapuspelanggan" data-id="{{$value->id}}" class="btn btn-block btn-danger btn-sm">Hapus</a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

</div>

@endsection