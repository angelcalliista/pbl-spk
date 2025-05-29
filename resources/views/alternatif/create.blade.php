@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Alternatif</h2>
    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Alternatif</label>
            <input type="text" class="form-control" id="kode" name="kode" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Alternatif</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
