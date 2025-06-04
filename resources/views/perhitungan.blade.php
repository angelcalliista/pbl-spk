@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Hasil Perangkingan Alternatif</h1>
        </div>
    </div>

    @if(isset($message))
        <div class="alert alert-warning">{{ $message }}</div>
    @endif

    @if(!empty($rankingData))
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Hasil Akhir Perangkingan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>Rank</th>
                                <th>Kode</th>
                                <th>Nama Alternatif</th>
                                <th>Total Skor Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rankingData as $item)
                            <tr>
                                <td class="text-center"><strong>{{ $item['Rank'] }}</strong></td>
                                <td>{{ $item['Alternatif']->kode }}</td>
                                <td>{{ $item['Alternatif']->nama_alternatif ?? $item['Alternatif']->nama }}</td> {{-- Sesuaikan nama properti --}}
                                <td class="text-end">{{ number_format($item['Score'], 4) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data untuk ditampilkan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if(!empty($arrayHitung))
            <div class="mt-5">
                <h2 class="h4 mb-3">Detail Perhitungan Profile Matching</h2>
                @foreach($arrayHitung as $indexAspek => $perhitunganAspek)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Aspek {{ $indexAspek + 1 }}: {{ $perhitunganAspek['Aspek']['value'] }} ({{ $perhitunganAspek['Aspek']['key'] }}) - Bobot: {{ $perhitunganAspek['Aspek']['nilai_persen'] }}%
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(empty($perhitunganAspek['Data']))
                                <p class="text-muted">Tidak ada data alternatif untuk aspek ini.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                                        <thead class="table-light">
                                            <tr class="text-center align-self-center">
                                                <th>Alternatif</th>
                                                @if(!empty($perhitunganAspek['Data'][0]['ProfileDetail']))
                                                    @foreach($perhitunganAspek['Data'][0]['ProfileDetail'] as $profileItem)
                                                        <th class="text-center" title="{{ $profileItem['value'] }}">
                                                            {{ $profileItem['key'] }}<br>
                                                            <small>(Target: {{ $profileItem['nilai_kriteria_target'] }})</small>
                                                        </th>
                                                    @endforeach
                                                @endif
                                                <th class="text-center">NCF</th>
                                                <th class="text-center">NSF</th>
                                                <th class="text-center">Total Nilai Aspek</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($perhitunganAspek['Data'] as $dataAlternatif)
                                            <tr>
                                                <td>{{ $dataAlternatif['Alternatif']->nama_alternatif ?? $dataAlternatif['Alternatif']->nama }}</td>
                                                @if(!empty($dataAlternatif['ProfileDetail']))
                                                    @foreach($dataAlternatif['ProfileDetail'] as $profileItem)
                                                    <td class="text-center" title="Nilai: {{ $profileItem['nilai_profile_alternatif'] }}, Gap: {{ $profileItem['gap'] }}, Bobot Gap: {{ $profileItem['bobot_gap'] }}">
                                                        {{ $profileItem['bobot_gap'] }}
                                                        @if($profileItem['factor'] == 1) <span class="badge bg-primary ms-1">C</span> @else <span class="badge bg-info ms-1">S</span> @endif
                                                    </td>
                                                    @endforeach
                                                @else
                                                    <td colspan="{{ count($kriteriaForThisAspek ?? []) }}" class="text-center text-muted">-</td>
                                                @endif
                                                <td class="text-center">{{ number_format($dataAlternatif['NCF'], 2) }}</td>
                                                <td class="text-center">{{ number_format($dataAlternatif['NSF'], 2) }}</td>
                                                <td class="text-center fw-bold">{{ number_format($dataAlternatif['TotalNilaiAlternatifPerAspek'], 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    @elseif(!isset($message))
        <div class="alert alert-info">Tidak ada data perangkingan yang tersedia. Pastikan data master (Alternatif, Aspek, Kriteria) dan data Nilai Profile sudah terisi.</div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .table-sm th, .table-sm td {
        padding: 0.4rem;
    }
</style>
@endpush
