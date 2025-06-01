@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Input Nilai Profile Alternatif</h1>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Berdasarkan Aspek</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.profile.index') }}" class="mb-3"> {{-- Menggunakan route name untuk index --}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="aspek_id" class="form-label">Pilih Aspek Penilaian</label>
                        <select name="aspek_id" id="aspek_id" class="form-select" onchange="this.form.submit()">
                            <option value="">-- Semua Aspek / Pilih Aspek --</option>
                            @foreach($aspekList as $aspek)
                                <option value="{{ $aspek->id }}" {{ (string)$selectedAspekId === (string)$aspek->id ? 'selected' : '' }}>
                                    {{ $aspek->kode }} - {{ $aspek->nama_aspek ?? $aspek->nama }} {{-- Sesuaikan dengan nama kolom/properti Anda --}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @if($selectedAspekId && $kriteriaList->count() > 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Formulir Nilai Profile untuk Aspek: {{ $aspekList->find($selectedAspekId)->nama_aspek ?? $aspekList->find($selectedAspekId)->nama ?? 'Tidak Ditemukan' }}
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.profile.store') }}"> {{-- PERUBAHAN RUTE --}}
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 20%;">Alternatif / Kriteria</th>
                                    @foreach($kriteriaList as $kriteria)
                                        <th>{{ $kriteria->nama_kriteria ?? $kriteria->nama }} <small>({{ $kriteria->kode }})</small></th> {{-- Sesuaikan --}}
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($alternatifList as $alternatif)
                                    <tr>
                                        <td>{{ $alternatif->nama_alternatif ?? $alternatif->nama }} <small>({{ $alternatif->kode }})</small></td> {{-- Sesuaikan --}}
                                        @foreach($kriteriaList as $kriteria)
                                            @php
                                                // Akses nilai profile dengan aman menggunakan optional helper
                                                $existingProfile = $nilaiProfiles[$alternatif->id][$kriteria->id] ?? null;
                                                $nilai = old('nilai.' . $alternatif->id . '.' . $kriteria->id, optional($existingProfile)->nilai_profile);
                                            @endphp
                                            <td>
                                                <input type="number"
                                                    name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]"
                                                    value="{{ $nilai }}"
                                                    min="1" max="5" {{-- Sesuaikan max value jika perlu --}}
                                                    class="form-control form-control-sm @error('nilai.' . $alternatif->id . '.' . $kriteria->id) is-invalid @enderror"
                                                    required
                                                    style="min-width: 70px; text-align: center;"
                                                />
                                                @error('nilai.' . $alternatif->id . '.' . $kriteria->id)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        @endforeach
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ $kriteriaList->count() + 1 }}" class="text-center">Belum ada data alternatif.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($alternatifList->count() > 0)
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Nilai Profile
                        </button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    @elseif($selectedAspekId && $kriteriaList->count() == 0)
        <div class="alert alert-warning">
            Tidak ada kriteria yang ditemukan untuk aspek yang dipilih.
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-1"></i> Silakan pilih aspek terlebih dahulu untuk menampilkan dan mengisi nilai profile.
        </div>
    @endif
</div>
@endsection

@push('styles')
{{-- Jika ada CSS khusus untuk halaman ini --}}
<style>
    .table th, .table td {
        vertical-align: middle;
    }
</style>
@endpush
