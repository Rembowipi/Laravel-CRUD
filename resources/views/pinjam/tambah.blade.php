@extends('template.main')

@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <h1 class="h3 mb-2 text-gray-800">Tambahkan Data Pinjaman Barang</h1>
            </h6>
        </div>
        <div class="card-body">


            <form action="/tambahpinjam/save" method="POST">
                @csrf
                <div class="form-group row mt-3">
                    <label for="" class="col-sm-2 col-form-label">ID Pinjaman</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="id" placeholder="ID Peminjaman">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="" class="col-sm-2 col-form-label">Nama Peminjam</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="peminjam" placeholder="Nama Peminjam">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tanggalpeminjaman">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-4">
                        {{-- <div class="input-group"> --}}
                            <input type="text" class="form-control" name="barang" readonly id="nama">
                            {{-- </div> --}}
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihBarang">Pilih Barang</button>
                </div>
                <div class="form-group row mt-3">
                    <label for="" class="col-sm-2 col-form-label">Jumlah Barang Saat Ini</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="jumlahbarang" readonly id="stok">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="" class="col-sm-2 col-form-label">Jumlah Barang yang Dipinjam</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="jumlahpinjam">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tanggalpeminjaman">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="" class="col-sm-2 col-form-label">Kondisi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="kondisi" readonly id="kondisi">
                    </div>
                </div>

                <a href="/pinjam" class="btn btn-secondary btn-md mt-5 ms-4">Cancel</a>
                <input type="submit" class="btn btn-primary mt-5 ms-2" name="simpan" value="Simpan">
            </form>
        </div>
    </div>
@endsection

@section('modals')
<div class="modal fade" id="pilihBarang" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">x</span> </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Kondisi</th>
                            <th width="4%">Jumlah Tersedia</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($databarang as $d)
                        <tr> 
                            <td>{{ $d->nama_barang }}</td>
                            <td><span class="badge badge-@if ($d->kondisi === 'Baru')primary @else()danger @endif()p-1">{{ $d->kondisi }}</span>
                        </td>
                            <td>{{ $d->jumlah }}</td>
                            <td><button type="button" id="barang" class="btn btn-primary btn-sm" data-barang="{{ $d->nama_barang }}" data-stok="{{ $d->jumlah }}" data-kondisi="{{ $d->kondisi }}" data-bs-dismiss="modal">Pilih</button></td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).on('click', '#barang', function(e) {
        var nama = $(this).attr("data-barang");
        var stok = $(this).attr("data-stok");
        var kondisi = $(this).attr("data-kondisi");
        $('#nama').val(nama);
        $('#stok').val(stok);
        $('#kondisi').val(kondisi);
    });
</script>
@endsection