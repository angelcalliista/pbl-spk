@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Hasil Perangkingan</h3>

        <!-- Tabel Hasil Perhitungan -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Alternatif</th>
                    <th>Total</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankingData as $item)
                <tr>
                    <td>{{ $item['Alternatif']->kode }}</td>
                    <td>{{ $item['Alternatif']->nama_alternatif }}</td>
                    <td>{{ number_format($item['Score'], 4) }}</td>
                    <td>{{ $item['Rank'], }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
