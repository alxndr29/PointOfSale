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
                    <label for="namasuplier">Nama Suplier</label>
                    <input type="text" class="form-control" id="namasuplier" value="{{$pelanggan->nama}}" placeholder="Masukan Nama Suplier" name="nama">
                </div>
                <div class="form-group">
                    <label for="alamatsuplier">Alamat Suplier</label>
                    <input type="text" class="form-control" id="alamatsuplier" value="{{$pelanggan->alamat}}" placeholder="Masukan Alamat Suplier" name="alamat">
                </div>
                <div class="form-group">
                    <label for="namakategori">Telepon Suplier</label>
                    <input type="text" class="form-control" id="namakategori" value="{{$pelanggan->telepon}}" placeholder="Masukan Telepon Suplier" name="telepon">
                </div>
                <button class="btn btn-primary">Edit</button>
            </div>
        </form>


        <div class="card-footer">

        </div>
    </div>
</div>

@endsection