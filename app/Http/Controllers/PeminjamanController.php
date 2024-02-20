<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\siswa;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = siswa::all();
       $item = barang::all();
       return view('peminjaman.create',compact('data','item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                'siswa_id' => 'required',
                'barang_id' => 'required',
                'tgl_pinjam' =>'required',
                'tgl_kembali' => 'required',
            ]);
             peminjaman::create([
                'siswa_id' => $request->siswa_id,
                'barang_id' => $request->barang_id,
                'tgl_pinjam' =>$request->tgl_pinjam,
                'tgl_kembali' => $request->tgl_kembali,
             ]);
             return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan']);
            
       
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Peminjaman $peminjaman)
    {
        $data= siswa::all();
        $item= barang::all();
        $pinjam= peminjaman::all();    
        return view('peminjaman.edit', compact('peminjaman', 'data','item', 'pinjam'));

            

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $this->validate($request, [
            'siswa_id' => 'required',
            'barang_id' => 'required',
            'tgl_pinjam' =>'required',
            'tgl_kembali' => 'required',
        ]);
         peminjaman::create([
            'siswa_id' => $request->siswa_id,
            'barang_id' => $request->barang_id,
            'tgl_pinjam' =>$request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
         ]);

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //delete post
        $peminjaman->delete();

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
