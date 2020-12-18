<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use DB;
use App\Barang;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kategori = Kategori::all();
        $barang = DB::table('barangs')
                    ->join('kategoris','kategoris.id','=','barangs.kategori_id')
                    ->select('barangs.*','kategoris.nama as namakategori')
                    ->paginate(1000);
       return view('admin.barangindex', compact('kategori','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.barangcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'barcode' => 'required|numeric|min:12',
            'nama' => 'required',
            'harga' => 'required|numeric|min:3',
            'stok' => 'required|numeric',
            'kategori_id' => 'required',
            'hargabeli' => 'required||numeric'
        ]);
        $barang = new Barang();
        $barang->barcode = $request->get('barcode');
        $barang->nama = $request->get('nama');
        $barang->hargajual = $request->get('harga');
        $barang->hargabeli = $request->get('hargabeli');
        $barang->stok = $request->get('stok');
        $barang->kategori_id = $request->get('kategori_id');
        $barang->save();
        
        return redirect('barang')->with('status','Berhasil Menambahkan Barang Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      
        $barang = DB::table('barangs')
                    ->join('kategoris','kategoris.id','=','barangs.kategori_id')
                    ->select('barangs.*','kategoris.nama as namakategori','kategoris.id as idkategori')
                    ->where('barangs.id','=',$id)
                    ->first();

        $kategori = Kategori::all();
        return view('admin.barangcreate', compact('kategori','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barcode' => 'required|numeric|min:12',
            'nama' => 'required',
            'hargajual' => 'required|numeric|min:3',
            'hargabeli' => 'required|numeric|min:3',
            'stok' => 'required|numeric',
            'kategori_id' => 'required',
            'hargabeli' => 'required||numeric'
        ]);
        
        $barang = Barang::find($id);
        $barang->barcode = $request->get('barcode');
        $barang->nama = $request->get('nama');
        $barang->hargajual = $request->get('hargajual');
        $barang->hargabeli = $request->get('hargabeli');
        $barang->stok = $request->get('stok');
        $barang->kategori_id = $request->get('kategori_id');
        $barang->save();

        return redirect('barang')->with('status','Berhasil Mengedit Data Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        $response = ['status' => 'Berhasil Menghapus Barang'];
        return response()->json($response);
    }
}
