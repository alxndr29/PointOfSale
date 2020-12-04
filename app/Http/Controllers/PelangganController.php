<?php

namespace App\Http\Controllers;
use DB;
use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pelanggan = Pelanggan::paginate(1000);
        return view('admin.pelangganindex',compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);
        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->get('nama');
        $pelanggan->alamat = $request->get('alamat');
        $pelanggan->telepon = $request->get('telepon');
        $pelanggan->save();

        return redirect('pelanggan')->with('status', 'Berhasil Menambah Data Pelanggan');
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
        $pelanggan = Pelanggan::findOrFail($id);
       
        return view('admin.pelangganupdate', compact('pelanggan'));
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
        //
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama = $request->get('nama');
        $pelanggan->alamat = $request->get('alamat');
        $pelanggan->telepon = $request->get('telepon');
        $pelanggan->save();
        
        return redirect('pelanggan')->with('status', 'Berhasil Mengubah Data Pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        $response = ['status' => 'Berhasil Menghapus Data Pelanggan'];
        return response()->json($response);

    }
}
