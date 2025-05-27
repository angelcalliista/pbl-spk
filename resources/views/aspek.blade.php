@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Form Input Aspek -->
        {{-- <form action="{{ route('aspek.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row g-3 align-items-center">
            <div class="col-md-2 mb-3">
                <label for="kode_aspek" class="form-label">Kode Aspek</label>
                <input type="text" id="kode_aspek" name="kode_aspek" class="form-control" placeholder="AI" required>
            </div>
            <div class="col-md-5">
                <label for="nama_aspek" class="form-label">Nama Aspek</label>
                <input type="text" id="nama_aspek" name="nama_aspek" class="form-control" placeholder="Aspek KeVibuan" required>
            </div>
            <div class="col-md-2">
                <label for="persentase" class="form-label">Persentase (%)</label>
                <input type="number" id="persentase" name="persentase" class="form-control" min="0" max="100" placeholder="40" required>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('aspek.pie') }}" class="btn btn-success">Pie</a>
            </div>
            </div>
        </form> --}}
        <form class="mb-4">
            @csrf
            <div class="col-md-2 mb-3">
                <label for="kode_aspek" class="form-label">Kode Aspek</label>
                <input type="text" id="kode_aspek" name="kode_aspek" class="form-control" placeholder="AI" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="nama_aspek" class="form-label">Nama Aspek</label>
                <input type="text" id="nama_aspek" name="nama_aspek" class="form-control" placeholder="Aspek KeVibuan" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="persentase" class="form-label">Persentase (%)</label>
                <input type="number" id="persentase" name="persentase" class="form-control" min="0" max="100" placeholder="40" required>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="#" class="btn btn-success">Pie</a>
            </div>
        </form>

        <!-- Pesan Informasi -->
        {{-- @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
        @endif --}}

        <!-- Tabel Daftar Aspek -->
        {{-- <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 15%;">Kode</th>
                <th>Nama Aspek</th>
                <th style="width: 15%;">Persentase</th>
                <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aspeks as $index => $aspek)
                <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $aspek->kode_aspek }}</td>
                <td>{{ $aspek->nama_aspek }}</td>
                <td>{{ $aspek->persentase }}%</td>
                <td>
                    <a href="{{ route('aspek.edit', $aspek->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('aspek.destroy', $aspek->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus aspek ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
                </tr>
                @endforeach
                @if($aspeks->isEmpty())
                <tr>
                <td colspan="5" class="text-center">Data aspek belum tersedia.</td>
                </tr>
                @endif
            </tbody>
            </table>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                {{-- <thead class="table-light">
                    <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 15%;">Kode</th>
                    <th>Nama Aspek</th>
                    <th style="width: 15%;">Persentase</th>
                    <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead> --}}
                {{-- <tbody>
                    @foreach($aspeks as $index => $aspek)
                    <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $aspek->kode_aspek }}</td>
                    <td>{{ $aspek->nama_aspek }}</td>
                    <td>{{ $aspek->persentase }}%</td>
                    <td>
                        <a href="{{ route('aspek.edit', $aspek->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('aspek.destroy', $aspek->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus aspek ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    @if($aspeks->isEmpty())
                    <tr>
                    <td colspan="5" class="text-center">Data aspek belum tersedia.</td>
                    </tr>
                    @endif
                </tbody> --}}
                <thead class="table-light">
                    <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 15%;">Kode</th>
                    <th>Nama Aspek</th>
                    <th style="width: 15%;">Persentase</th>
                    <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kode1</td>
                        <td>Nama1</td>
                        <td>40%</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm me-1">Edit</a>
                            <form method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus aspek ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
