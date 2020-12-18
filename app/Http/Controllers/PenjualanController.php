<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\NotaJual;
use App\Pelanggan;
use App\Barang;
use App\User;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();
        return view('admin.indexpenjualan', compact('pelanggan','barang'));
        
    }
    public function barang()
    {
        $barang = Barang::all();
        return json_encode($barang);
    }
    public function search($name)
    {
        return json_encode($name);
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
        $data = $request->get('id');

        $pelanggan = Pelanggan::findOrFail($request->get('idpelanggan'));
        $user = User::findOrFail(Auth::user()->id);

        $nota = new NotaJual();
        $nota->pelanggan()->associate($pelanggan);
        $nota->users()->associate($user);
        $nota->save();


        foreach ($data as $key => $value) {
            $barang = Barang::findOrFail($value['id']);
            $nota->barangs()->save($barang, ['jumlah' => $value['qty'], 'harga' => ($value['hargajual'] * $value['qty']),'hargamodal' => ($value['hargabeli'] * $value['qty'])]);
            $barang->stok = $value['stok'] - $value['qty'];
            $barang->save();
        }

        return response()->json([
            'success' => 'berhasil'
        ]);
    }
    public function test()
    {
        $nota = NotaJual::all();
        foreach ($nota as $notas) { }
        $test = "";
       foreach($nota->barangs as $a){
           return a;
       }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $notadetil = DB::table('notajualdetil')->where('notajual_id','=',$id)->get();
       foreach($notadetil as $key => $value){
           $barang = Barang::find($value->barang_id);
           $barang->stok = $barang->stok + $value->jumlah;
           $barang->save();
       }
       DB::table('notajualdetil')->where('notajual_id','=',$id)->delete();
       DB::table('notajuals')->where('id','=',$id)->delete();
       $response = ['status' => 'Berhasil Menghapus Data Penjualan'];   
       return response()->json($response);

    }
}
