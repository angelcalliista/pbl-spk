@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Alternatif</h3>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Alternatif</button>

    <!-- Tabel Alternatif -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alternatifs as $index => $alt)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $alt->kode }}</td>
                <td>{{ $alt->nama }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $alt->id }}">Edit</button>

                    <!-- Form Hapus -->
                    <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{ $alt->id }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{ route('alternatif.update', $alt->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Alternatif</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control" value="{{ $alt->kode }}" required>
                      </div>
                      <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $alt->nama }}" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            @empty
            <tr><td colspan="4" class="text-center">Data tidak tersedia.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Alternatif</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
