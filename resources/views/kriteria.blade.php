@extends('layouts.app')

@section('content')
    <div class="container">

    <!-- Form Input Kriteria -->
    {{-- <form action="{{ route('kriteria.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-3 align-items-center">
        <div class="col-md-3">
            <label for="aspek_id" class="form-label">Pilih Aspek</label>
            <select id="aspek_id" name="aspek_id" class="form-select" required>
            <option value="" disabled selected>-- Pilih Aspek --</option>
            @foreach($aspeks as $aspek)
                <option value="{{ $aspek->id }}">{{ $aspek->kode_aspek }} - {{ $aspek->nama_aspek }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
            <input type="text" id="kode_kriteria" name="kode_kriteria" class="form-control" placeholder="A11" required>
        </div>
        <div class="col-md-3">
            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
            <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control" placeholder="Kriteria Ke-1" required>
        </div>
        <div class="col-md-2">
            <label for="nilai" class="form-label">Nilai (1-9)</label>
            <input type="number" id="nilai" name="nilai" class="form-control" min="1" max="9" placeholder="5" required>
        </div>
        <div class="col-md-2">
            <label class="form-label d-block">Factor</label>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="factor" id="factor_core" value="Core" required>
            <label class="form-check-label" for="factor_core">Core</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="factor" id="factor_secondary" value="Secondary" required>
            <label class="form-check-label" for="factor_secondary">Secondary</label>
            </div>
        </div>
        </div>

        <div class="mt-3">
        <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form> --}}
    <form method="POST" class="mb-4">
        @csrf
        <div class="col-md-3 mb-3">
            <label for="aspek_id" class="form-label">Pilih Aspek</label>
            <select id="aspek_id" name="aspek_id" class="form-select" required>
            <option value="" disabled selected>-- Pilih Aspek --</option>
                <option value="">contoh 1</option>
                <option value="">contoh 2</option>
                <option value="">contoh 3</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
            <input type="text" id="kode_kriteria" name="kode_kriteria" class="form-control" placeholder="A11" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
            <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control" placeholder="Kriteria Ke-1" required>
        </div>
        <div class="col-md-2 mb-3">
            <label for="nilai" class="form-label">Nilai (1-5)</label>
            <input type="number" id="nilai" name="nilai" class="form-control" min="1" max="5" placeholder="5" required>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label d-block">Factor</label>
            <div class="form-check form-check">
                <input class="form-check-input" type="radio" name="factor" id="factor_core" value="Core" required>
                <label class="form-check-label" for="factor_core">Core</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="factor" id="factor_secondary" value="Secondary" required>
                <label class="form-check-label" for="factor_secondary">Secondary</label>
            </div>
        </div>
        </div>

        <div class="mt-3">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <!-- Pesan Informasi -->
    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif

    <!-- Tabel Daftar Kriteria -->
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered align-middle">
        <thead class="table-light">
            <tr>
            <th style="width: 5%;">#</th>
            <th style="width: 15%;">Kode Kriteria</th>
            <th style="width: 20%;">Aspek</th>
            <th>Nama Kriteria</th>
            <th style="width: 10%;">Nilai</th>
            <th style="width: 15%;">Factor</th>
            <th style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>1</td>
            <td>kode</td>
            <td>aspek</td>
            <td>kriteria</td>
            <td>nilai</td>
            <td>core</td>
            <td>
                <a class="btn btn-warning btn-sm me-1">Edit</a>
                <form method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kriteria ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
            </tr>
        </tbody>
        {{-- <tbody>
            @foreach($kriterias as $index => $kriteria)
            <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $kriteria->kode_kriteria }}</td>
            <td>{{ $kriteria->aspek->nama_aspek ?? '-' }}</td>
            <td>{{ $kriteria->nama_kriteria }}</td>
            <td>{{ $kriteria->nilai }}</td>
            <td>{{ $kriteria->factor }}</td>
            <td>
                <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kriteria ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
            </tr>
            @endforeach
            @if($kriterias->isEmpty())
            <tr>
            <td colspan="7" class="text-center">Data kriteria belum tersedia.</td>
            </tr>
            @endif
        </tbody> --}}
        </table>
    </div>
    </div>
@endsection
