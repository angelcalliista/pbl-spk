@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Data Aspek</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('admin.aspek.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Nilai Aspek
            </a>
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Aspek</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTableAspek" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aspek as $index => $item) {{-- Mengganti $alt menjadi $item untuk konsistensi, dan $index untuk nomor urut --}}
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <a href="{{ route('admin.aspek.edit', $item->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.aspek.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data aspek.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTableAspek').DataTable({
            responsive: true,
            language: {
                "decimal":        "",
                "emptyTable":     "Tidak ada data yang tersedia di tabel",
                "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 entri",
                "infoFiltered":   "(disaring dari _MAX_ total entri)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Tampilkan _MENU_ entri",
                "loadingRecords": "Memuat...",
                "processing":     "Sedang diproses...",
                "search":         "Cari:",
                "zeroRecords":    "Tidak ada data yang cocok ditemukan",
                "paginate": {
                    "first":      "Pertama",
                    "last":       "Terakhir",
                    "next":       "Berikutnya",
                    "previous":   "Sebelumnya"
                },
                "aria": {
                    "sortAscending":  ": aktifkan untuk mengurutkan kolom secara menaik",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                }
            },
            "columnDefs": [
                { "orderable": false, "targets": 3 } // Kolom 'Aksi' adalah target ke-3 (indeks)
            ]
        });
    });
</script>
@endpush
