@extends('template.main')

@section('konten')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ $kategori }} {{ $title }}</h1>
        <p class="mb-4">Manajemen {{ $title }} | Inventory {{ $title }}</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <button type="button" class="btn btn-sm btn-primary float-right" data-bs-toggle="modal" data-bs-target="#tambahData"><i class="fas fa-plus me-1"></i> Tambah Barang</button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Spesifikasi</th>
                                <th>Lokasi</th>
                                <th>Kondisi</th>
                                <th>Jumlah</th>
                                <th>Sumber Dana</th>
                                <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $id = 0;
                            @endphp
                            @foreach ($data as $d)
                                <tr>

                                    @php
                                     $id = $d->id;
                                    @endphp

                                    <td width="5%">{{ $no++ }}</td>
                                    <td>{{ $d->id_barang }}</td>
                                    <td>{{ $d->nama_barang }}</td>
                                    <td>{{ $d->spesifikasi }}</td>
                                    <td>{{ $d->lokasi }}</td>
                                    <td><span
                                            class="badge badge-@if ($d->kondisi === 'Baru')primary @else()danger @endif()p-1">{{ $d->kondisi }}</span>
                                    </td>
                                    <td>{{ $d->jumlah }}</td>
                                    <td>{{ $d->sumber_dana }}</td>
                                    <td> <button type="button" id="edit" class="btn btn-warning btn-sm"  data-bs-toggle="modal" data-bs-target="#editData" data-kode='{{ $d->id_barang }}' data-nama='{{ $d->nama_barang }}' data-spesifikasi='{{ $d->spesifikasi }}' data-lokasi="{{ $d->lokasi }}" data-kondisi='{{ $d->kondisi }}' data-jumlah='{{ $d->jumlah }}' data-sumber='{{ $d->sumber_dana }}'><i class="fas fa-pen"></i></button> 
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete"><i class="fas fa-trash"></i></button>         
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modals')
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modaldialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">x</span> </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('barang/save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="id_barang" aria-describedby="id_barang" name="id_barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" aria-describedby="nama_barang"
                            name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label>
                        <input type="text" class="form-control" id="spesifikasi" name="spesifikasi">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="" selected>Pilih</option>
                            <option value="baru">Baru</option>
                            <option value="bekas">Bekas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <input type="text" class="form-control" id="sumber_dana" name="sumber_dana">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editData" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modaldialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">x</span> </button>
            </div>
            <div class="modal-body">
                <form action="/barang/update/{{ $id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="id_edit" aria-describedby="id_barang" name="id_barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_edit" aria-describedby="nama_barang" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label>
                        <input type="text" class="form-control" id="spesifikasi_edit" name="spesifikasi">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi_edit" name="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi_edit" class="form-control">
                            <option value="" selected>Pilih</option>
                            <option value="baru">Baru</option>
                            <option value="bekas">Bekas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_edit" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <input type="text" class="form-control" id="sumber_edit" name="sumber_dana">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Simpan" name="edit">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modaldialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data ini?</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">x</span> </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form action="barang/delete/{{ $id }}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>   
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
      $(document).on('click', '#edit', function(e) {
        var kode = $(this).attr("data-kode");
        var nama = $(this).attr("data-nama");
        var spesifikasi = $(this).attr("data-spesifikasi");
        var lokasi = $(this).attr("data-lokasi");
        var jumlah = $(this).attr("data-jumlah");
        var sumber = $(this).attr("data-sumber");
        $('#id_edit').val(kode);
        $('#nama_edit').val(nama);
        $('#spesifikasi_edit').val(spesifikasi);
        $('#lokasi_edit').val(lokasi);
        $('#jumlah_edit').val(jumlah);
        $('#sumber_edit').val(sumber);
    });
</script>


    <script>
        @if ($message = Session::get('dataTambah'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton:  false,
            timer: 3000,
            timeProgressBar : true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Data Barang Berhasil ditambah'
        }) @endif
    </script>
@endsection