<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index', [
            'title' => 'Barang',
            'data' => Barang::all(),
            'kategori' => 'Data'
        ]);
    }

    public function save(Request $request){
        Barang::create($request->except(['_token', 'simpan']));
        return redirect()->to(url('barang'))->with('dataTambah', 'Data Berhasil di Tambah');
    }

    public function delete($id){
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->to(url('/barang'));
    }

    public function update($id, Request $request){
        $barang = Barang::find($id);
        $barang->update($request->except(['_token', 'simpan']));
        return redirect()->to(url('/barang'));
    }

}
