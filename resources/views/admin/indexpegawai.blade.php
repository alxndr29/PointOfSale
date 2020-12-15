@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="row">
        <div class="col-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Pegawai</h3>
                </div>
                <form method="post" action="{{ route('pegawaistore') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="barcodebarang">Email Pegawai</label>
                            <input type="email" class="form-control" id="barcodebarang" placeholder="Masukan Email Pegawai" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="namabarang">Nama Pegawai</label>
                            <input type="text" class="form-control" id="namabarang" placeholder="Masukan Nama Pegawai" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="hargabarang">Password Sementara</label>
                            <input type="password" class="form-control" id="hargabarang" placeholder="Masukan Password Sementara" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="stokbarang">Hak Akses Pegawai</label>
                            <select class="form-control" name="kategori_id" required>
                                <option value="1">Administrator</option>
                                <option value="2">Kasir</option>
                                <option value="3">Umum</option>
                            </select>
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
                    <h3 class="card-title">Master Pegawai</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body table-responsive text-center">
                                <table class="table table-head-fixed text-nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            
                                            <th>Hak Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $key => $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                           
                                            <td>Belum Coding</td>
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
<script type="text/javascript">

</script>
@endsection