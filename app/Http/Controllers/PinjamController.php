<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pinjam;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index(){
        return view('pinjam.index', [
            'kategori' => 'Transaksi',
            'title' => 'Peminjaman',
            'data' => Pinjam::all()
        ]);
    }

    public function tambah(){
        return view('pinjam.tambah', [
            'title' => 'Peminjaman',
            'kategori' => 'Penambahan',
            'databarang' => Barang::all(),
        ]);
    }

    public function save(Request $request){
        Pinjam::create($request->except(['_token', 'simpan']));
        return redirect()->to(url('barang'))->with('dataTambah', 'Data Berhasil di Tambah');
    }
}
