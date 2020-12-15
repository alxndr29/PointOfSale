<?php

namespace App\Http\Controllers;
use App\Suplier;
use App\Barang;
use App\NotaBeli;
use PDF;
use DB;
use Carbon;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suplier = Suplier::all();
        $barang = Barang::all();

        return view('admin.indexpembelian',compact('barang','suplier'));
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
        $nota = new NotaBeli();
        $nota->tipebayar = $request->get('jenispembayaran');
        $nota->jumlahhari = $request->get('jatuhtempo');
        $nota->suplier_id = $request->get('suplier');
        $nota->status = "Menunggu Pengantaran";
        $nota->save();

        $data = $request->get('id');
        foreach($data as $key => $value){
            DB::table('notabelidetil')->insert([
                'id_notabeli' => $nota->id,
                'id_barang' => $value['id'],
                'jumlah' => $value['qty'],
                'harga' => $value['hargabeli'] * $value['qty']
            ]);
        }

        return response()->json([
            'success' => 'berhasil',
            'jenispembayaran' => $request->get('jenispembayaran'),
            'suplier' => $request->get('suplier'),
            'jatuhtempo' => $request->get('jatuhtempo')
        ]);
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
        //
    }
}
