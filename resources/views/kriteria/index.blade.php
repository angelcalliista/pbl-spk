@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Data Kriteria</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('admin.kriteria.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Nilai Kriteria
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kriteria Penilaian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTableKriteria" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Aspek Terkait</th>
                            <th>Nama Kriteria</th>
                            <th>Nilai Target</th>
                            <th>Jenis Faktor</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kriterias as $index => $kriteria) {{-- Mengganti $alt menjadi $kriteria dan menambahkan $index --}}
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $kriteria->kode }}</td>
                                <td>
                                    @if ($kriteria->aspek) {{-- Cek apakah relasi aspek ada --}}
                                        {{ $kriteria->aspek->kode }} - {{ $kriteria->aspek->nama }}
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>{{ $kriteria->nama }}</td>
                                <td>{{ $kriteria->nilai }}</td>
                                <td>
                                    @if($kriteria->factor == 1)
                                        <span class="badge bg-primary">Core Factor</span>
                                    @elseif($kriteria->factor == 2)
                                        <span class="badge bg-info">Secondary Factor</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.kriteria.destroy', $kriteria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kriteria ini?')">
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
                                <td colspan="7" class="text-center">Belum ada data kriteria.</td>
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
        $('#dataTableKriteria').DataTable({
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
                { "orderable": false, "targets": 6 } // Kolom 'Aksi' adalah target ke-6 (indeks dari 0)
            ]
        });
    });
</script>
@endpush
