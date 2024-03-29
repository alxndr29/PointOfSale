<?php

namespace App\Http\Controllers;

use App\NotaBeli;
use App\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suplier = Suplier::paginate(1000);
        return view('admin.suplierindex', compact('suplier'));
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
            'telepon' => 'required|numeric'
        ]);

        $suplier = new Suplier();
        $suplier->nama = $request->get('nama');
        $suplier->alamat = $request->get('alamat');
        $suplier->telepon = $request->get('telepon');
        $suplier->save();
        return redirect('suplier')->with('status', 'Berhasil Menambah Suplier Baru');
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
        $suplier = Suplier::findOrFail($id);
        return view('admin.suplierupdate', compact('suplier'));
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
            'telepon' => 'required|numeric'
        ]);

        $suplier = Suplier::find($id);
        $suplier->nama = $request->get('nama');
        $suplier->alamat = $request->get('alamat');
        $suplier->telepon = $request->get('telepon');
        $suplier->save();
        return redirect('suplier')->with('status', 'Berhasil Mengubah Data Suplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = NotaBeli::where('suplier_id', '=', $id)->count();
        if ($count == 0) {
            $suplier = Suplier::find($id);
            $suplier->delete();
            $response = ['status' => 'Berhasil Menghapus Suplier'];
            return response()->json($response);
        } else {
            $response = ['status' => 'Tidak Dapat Menghapus. Data Suplier Digunakan Pada Nota Beli'];
            return response()->json($response);
         }
    }
}
