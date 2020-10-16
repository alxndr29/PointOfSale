@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
            </div>
            <form method="post" action="{{ route('barangupdate', $barang->id) }}">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="barcodebarang">Barcode Barang</label>
                        <input type="number" class="form-control" id="barcodebarang" value="{{$barang->barcode}}" placeholder="Masukan Barcode Barang" name="barcode" required>
                    </div>
                    <div class="form-group">
                        <label for="namabarang">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang" value="{{$barang->nama}}" placeholder="Masukan Nama Barang" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="hargabarang">Harga Barang</label>
                        <input type="text" class="form-control" id="hargabarang" value="{{$barang->harga}}" placeholder="Masukan Harga Barang" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="stokbarang">Stok Barang</label>
                        <input type="text" class="form-control" id="stokbarang" value="{{$barang->stok}}" placeholder="Masukan Stok Barang" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label for="stokbarang">Kategori Barang</label>
                        <select class="form-control" name="kategori_id" required>
                            <option value="{{$barang->idkategori}}" selected>{{$barang->namakategori}}</option>
                            @foreach($kategori as $key => $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
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