@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Pegawai</h3>
            </div>
            <form method="post" action="{{ route('pegawaiupdate',$user->id) }}">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="barcodebarang">Email Pegawai</label>
                        <input type="email" class="form-control" id="barcodebarang" placeholder="Masukan Email Pegawai" name="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="namabarang">Nama Pegawai</label>
                        <input type="text" class="form-control" id="namabarang" placeholder="Masukan Nama Pegawai" name="nama" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="hargabarang">Password Sementara</label>
                        <input type="password" class="form-control" id="hargabarang" placeholder="Masukan Password Sementara" name="password">
                    </div>
                    <div class="form-group">
                        <label for="stokbarang">Hak Akses Pegawai</label>
                        <select class="form-control" name="role_id" required>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Edit</button>
                </div>
            </form>
            <div class="card-footer">

            </div>
        </div>

    </div>
</div>

@endsection