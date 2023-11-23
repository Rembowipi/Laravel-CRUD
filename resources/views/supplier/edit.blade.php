@extends('template.main')

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <h1 class="h3 mb-2 text-gray-800">Edit Data Supplier</h1>
        </h6>
    </div>
    <div class="card-body">


        <form action="/edit/{{ $supplier->id }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group row mt-3">
                <label for="" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama" placeholder="Nama Supplier" value="{{ $supplier->nama }}">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ $supplier->alamat }}">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="notelp" placeholder="No. Telp" value="{{ $supplier->notelp }}">
                </div>
            </div>

            <a href="/supplier" class="btn btn-secondary btn-md mt-5 ms-4">Cancel</a>
            <input type="submit" class="btn btn-primary mt-5 ms-2" name="simpan" value="Simpan">
        </form>
    </div>
</div>
@endsection
