@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Pelanggan</h3>
        </div>

        <form method="post" action="{{ route('pelangganupdate', $pelanggan->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="namasuplier">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namasuplier" value="{{$pelanggan->nama}}" placeholder="Masukan Nama Suplier" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="alamatsuplier">Alamat Pelanggan</label>
                    <input type="text" class="form-control" id="alamatsuplier" value="{{$pelanggan->alamat}}" placeholder="Masukan Alamat Suplier" name="alamat" required>
                </div>
                <div class="form-group">
                    <label for="namakategori">Telepon Pelanggan</label>
                    <input type="number" class="form-control" id="namakategori" value="{{$pelanggan->telepon}}" placeholder="Masukan Telepon Suplier" name="telepon" required>
                </div>
                <button class="btn btn-primary">Edit</button>
            </div>
        </form>


        <div class="card-footer">

        </div>
    </div>
</div>

@endsection