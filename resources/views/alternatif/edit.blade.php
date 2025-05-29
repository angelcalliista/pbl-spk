@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Alternatif</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input
                type="text"
                name="kode"
                id="kode"
                class="form-control"
                value="{{ old('kode', $alternatif->kode) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input
                type="text"
                name="nama"
                id="nama"
                class="form-control"
                value="{{ old('nama', $alternatif->nama) }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
