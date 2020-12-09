<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Barang;
use DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::paginate(1000);
        return view('admin.kategoriindex', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kategoricreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required'
        ]);

        $kategori = new Kategori();
        $kategori->nama = $request->get('nama');
        $kategori->save();
        return redirect('kategori')->with('status', 'Berhasil Menambah Kategori Baru');
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
        $kategori = Kategori::findOrFail($id);
        /*
       $kategori = DB::table('kategoris')
                ->where('kategoris.id', '=',$id)
                ->first();
        */
        return view('admin.kategoriupdate', compact('kategori'));
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
            'nama' => 'required|alpha'
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama = $request->get('nama');
        $kategori->save();
        return redirect('kategori')->with('status', 'Berhasil Mengedit Data Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Barang::where('kategori_id', $id)->count();
        if ($count == 0) {
            $kategori = Kategori::find($id);
            $kategori->delete();
            $response = ['status' => 'Berhasil Menghapus Data Kategori'];   
        } else { 
            $response = ['status' => 'Tidak Dapat Menghapus. Data Kategori Masih Digunakan Untuk Barang'];  
        }
        return response()->json($response);
    }
}
