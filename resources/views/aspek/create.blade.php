@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Tambah Aspek Penilaian Baru</h1>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Data Aspek</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.aspek.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="kode" class="form-label">Kode Aspek <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}" placeholder="Contoh: A1" required>
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama Aspek <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Aspek Kecerdasan" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="persentase" class="form-label">Persentase Bobot (%) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('persentase') is-invalid @enderror" id="persentase" name="persentase" value="{{ old('persentase') }}" min="0" max="100" placeholder="Contoh: 40" required>
                        @error('persentase')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3"> {{-- Tombol diletakkan di baris baru --}}
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-save me-1"></i> Simpan Aspek
                    </button>
                    <a href="{{ route('admin.aspek.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    {{-- Tombol Pie Chart, jika masih relevan, bisa diletakkan di sini atau di halaman index --}}
                    {{-- <a href="#" class="btn btn-success ms-2" title="Lihat Pie Chart Distribusi Aspek (jika ada)">
                        <i class="fas fa-chart-pie me-1"></i> Pie
                    </a> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
