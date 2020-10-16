@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="row">
        <div class="col-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>
                <form method="post" action="{{ route('kategoristore') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namakategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="namakategori" placeholder="Masukan Nama Kategori" name="nama">
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
                    <h3 class="card-title">Master Kategori</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Kategori</h3>
                                <div class="card-tools">

                                    <div class="input-group input-group-sm" style="width: 150px;">

                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body table-responsive p-0 text-center">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>ID Kategori</th>
                                            <th>Nama</th>

                                            <th> Edit </th>
                                            <th> Hapus </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kategori as $key => $value)
                                        <tr>
                                            <td>{{$kategori->firstItem() + $key }}</td>
                                            <td>KTGR{{$value->id}}</td>
                                            <td>{{$value->nama}}</td>
                                            <td><a class="btn btn-block btn-success btn-sm" href="{{route('kategoriedit',$value->id)}}">Edit</a></td>

                                            <!--
                                            <td>
                                                <form method="post" action="{{route('kategoridelete',$value->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-block btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                            -->

                                            <td>
                                                <a href="javascript:void(0)" id="hapuskategori" name="hapuskategori" data-id="{{$value->id}}" class="btn btn-block btn-danger btn-sm">Hapus</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                {{ $kategori->links() }}


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