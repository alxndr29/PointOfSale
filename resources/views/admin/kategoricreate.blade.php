@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
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

@endsection