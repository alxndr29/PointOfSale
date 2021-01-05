@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Kategori</h3>
        </div>

        <form method="post" action="{{ route('kategoriupdate', $kategori->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="namakategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namakategori" placeholder="Masukan Nama Kategori" name="nama" value="{{$kategori->nama}}" required>
                </div>
                <button class="btn btn-primary">Edit</button>
            </div>
        </form>


        <div class="card-footer">

        </div>
    </div>
</div>

@endsection