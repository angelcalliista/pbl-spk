@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Edit Alternatif</h1>
        </div>
    </div>

    {{-- Menghapus blok error global jika kita akan menampilkan error per field --}}
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Alternatif: {{ $alternatif->nama }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.alternatif.update', $alternatif->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Alternatif <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="kode"
                        id="kode"
                        class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode', $alternatif->kode) }}"
                        placeholder="Contoh: A1"
                        required
                    >
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Alternatif <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $alternatif->nama) }}"
                        placeholder="Contoh: Alternatif Karyawan A"
                        required
                    >
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success me-2">
                        <i class="fas fa-sync-alt me-1"></i> Update Perubahan
                    </button>
                    <a href="{{ route('admin.alternatif.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
