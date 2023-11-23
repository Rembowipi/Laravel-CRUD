 @extends('template.main')

@section('konten')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ $kategori }} {{ $title }}</h1>
        <p class="mb-4">Manajemen {{ $title }} | Inventory {{ $title }}</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a  href="/tambahSupplier" class="btn btn-primary btn-sm float-start mb-2 mt-1"><i class="fas fa-plus me-1"></i> Tambah Data</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th width="13%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <td class="align-middle">{{ $no++ }}</td>
                                    <td class="align-middle">{{ $d->nama }}</td>
                                    <td class="align-middle">{{ $d->alamat }}</td>
                                    <td class="align-middle">{{ $d->notelp }}</td>
                                    <td class="align-middle">
                                        <a href="/update/{{ $d->id }}" class="btn btn-warning btn-sm">Edit</a> 
                                        <form action="delete/{{ $d->id }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form>                
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