@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Edit Aspek Penilaian</h1>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Aspek: {{ $aspek->nama }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.aspek.update', $aspek->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="kode" class="form-label">Kode Aspek <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="kode"
                            id="kode"
                            class="form-control @error('kode') is-invalid @enderror"
                            value="{{ old('kode', $aspek->kode) }}"
                            placeholder="Contoh: A1"
                            required
                        >
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama Aspek <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="nama"
                            id="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $aspek->nama) }}"
                            placeholder="Contoh: Aspek Kecerdasan"
                            required
                        >
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="persentase" class="form-label">Persentase Bobot (%) <span class="text-danger">*</span></label>
                        <input
                            type="number"
                            name="persentase"
                            id="persentase" {{-- Pastikan ID benar (sebelumnya ada typo 'persentasse') --}}
                            class="form-control @error('persentase') is-invalid @enderror"
                            value="{{ old('persentase', $aspek->persentase) }}"
                            min="0" max="100"
                            placeholder="Contoh: 40"
                            required
                        >
                        @error('persentase')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3"> {{-- Tombol diletakkan di baris baru --}}
                    <button type="submit" class="btn btn-success me-2">
                        <i class="fas fa-sync-alt me-1"></i> Update Perubahan
                    </button>
                    <a href="{{ route('admin.aspek.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
