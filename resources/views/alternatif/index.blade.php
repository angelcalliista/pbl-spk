@extends('layouts.app')

@section('content')
    <h1>Data Alternatif</h1>
    <a href="{{ route('alternatif.create') }}" class="btn btn-primary">+ Tambah Alternatif</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alternatifs as $alt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $alt->kode }}</td>
                    <td>{{ $alt->nama }}</td>
                    <td>
                        <a href="{{ route('alternatif.edit', $alt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
