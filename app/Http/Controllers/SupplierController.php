<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SupplierController extends Controller
{
    public function index(){
        return view('supplier.supplier', [
            'title' => 'Supplier',
            'data' => Supplier::all(),
            'kategori' => 'Data'
        ]);
    }

    public function tambah(){
        return view('supplier.tambahSupplier', [
            'title' => 'Supplier',
            'kategori' => 'Penambahan'
        ]);
    }

    public function save(Request $request){
        DB::table('supplier')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
        ]);
        return redirect()->to(url('/supplier'));
    }

    // public function save(Request $request){
    //     Supplier::create($request->except(['_token', 'simpan']));
    //     return redirect()->to(url('barang'))->with('dataTambah', 'Data Berhasil di Tambah');
    // }

    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->to(url('/supplier'));
    }

    public function edit($id, Request $request){
        $supplier = Supplier::find($id);
        $supplier->update($request->except(['_token', 'simpan']));
        return redirect()->to(url('/supplier'));
    }

    public function update($id){
        $supplier = Supplier::find($id);
        $data = [
                'supplier' => $supplier,
                'title' => 'Supplier',
                'kategori' => 'Edit'
        ];
        return view('supplier.edit', $data);
    }
}
