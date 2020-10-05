@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
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

                    <div class="card-body table-responsive p-0">
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
                                    <td>{{$key + 1}}</td>
                                    <td>KTGR{{$value->id}}</td>
                                    <td>{{$value->nama}}</td>
                                    <td><a type="button" class="btn btn-block btn-success btn-sm" href="{{route('kategoriedit',$value->id)}}">Edit</a></td>
                                    <td>
                                        <form method="post" action="{{route('kategoridelete',$value->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button  class="btn btn-block btn-danger btn-sm">Hapus</button>
                                        </form>
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

@endsection