@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Edit Kriteria Penilaian</h1>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Kriteria: {{ $kriterium->nama }}</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.kriteria.update', $kriterium->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="id_aspek" class="form-label">Pilih Aspek <span class="text-danger">*</span></label>
                        <select id="id_aspek" name="id_aspek" class="form-select @error('id_aspek') is-invalid @enderror" required>
                            <option value="" disabled>-- Pilih Aspek --</option>
                            @foreach ($aspeks as $aspek)
                                <option value="{{ $aspek->id }}" {{ old('id_aspek', $kriterium->id_aspek) == $aspek->id ? 'selected' : '' }}>
                                    {{ $aspek->kode }} - {{ $aspek->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_aspek')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="kode" class="form-label">Kode Kriteria <span class="text-danger">*</span></label>
                        <input type="text" id="kode" name="kode" value="{{ old('kode', $kriterium->kode) }}" class="form-control @error('kode') is-invalid @enderror" placeholder="Contoh: K1" required>
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nama" class="form-label">Nama Kriteria <span class="text-danger">*</span></label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $kriterium->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Contoh: Kemampuan Analisis" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3"> {{-- Disesuaikan agar layout lebih seimbang --}}
                        <label for="nilai" class="form-label">Nilai Target (1-5) <span class="text-danger">*</span></label>
                        <input type="number" id="nilai" name="nilai" value="{{ old('nilai', $kriterium->nilai) }}" class="form-control @error('nilai') is-invalid @enderror" min="1" max="5" placeholder="Contoh: 4" required>
                        @error('nilai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> {{-- End first row for inputs --}}

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label d-block">Jenis Faktor <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input @error('factor') is-invalid @enderror" type="radio" name="factor" id="factor_core" value="1" {{ old('factor', $kriterium->factor) == 1 ? 'checked' : '' }} required>
                            <label class="form-check-label" for="factor_core">Core Factor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('factor') is-invalid @enderror" type="radio" name="factor" id="factor_secondary" value="2" {{ old('factor', $kriterium->factor) == 2 ? 'checked' : '' }} required>
                            <label class="form-check-label" for="factor_secondary">Secondary Factor</label>
                        </div>
                        @error('factor')
                            <div class="invalid-feedback d-block">{{ $message }}</div> {{-- d-block agar tampil di bawah radio --}}
                        @enderror
                    </div>
                </div> {{-- End second row for inputs (if needed) --}}

                <div class="mt-4">
                    <button type="submit" class="btn btn-success me-2">
                        <i class="fas fa-sync-alt me-1"></i> Update Perubahan
                    </button>
                    <a href="{{ route('admin.kriteria.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
