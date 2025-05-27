@extends('layouts.app')

@section('content')
  <!-- Konten halaman Alternatif di sini -->
    {{-- Form Input --}}
    {{-- <form action="{{ route('alternatif.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Masukkan Kode Alternatif</label>
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode1" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Masukkan Nama Alternatif</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Rieqy Muwachid Erysya" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form> --}}
    <form method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Masukkan Kode Alternatif</label>
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode1" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Masukkan Nama Alternatif</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Rieqy Muwachid Erysya" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    {{-- Tabel Data --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kode1</td>
                <td>Nama1</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Kode1</td>
                <td>Nama1</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Kode1</td>
                <td>Nama1</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        </tbody>
        {{-- <tbody>
            @foreach ($alternatifs as $index => $alt)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $alt->kode }}</td>
                <td>{{ $alt->nama }}</td>
                <td>
                    <a href="{{ route('alternatif.edit', $alt->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($alternatifs->isEmpty())
            <tr>
                <td colspan="4" class="text-center">Data tidak tersedia</td>
            </tr>
            @endif
        </tbody> --}}
    </table>
@endsection

