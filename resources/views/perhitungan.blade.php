@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Hasil Perangkingan</h3>

        <!-- Tabel Hasil Perhitungan -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>Total</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($hasilPerhitungan as $index => $hasil)
                <tr>
                    <td>{{ $hasil['alternatif'] }}</td>
                    <td>{{ number_format($hasil['survival'], 4) }}</td>
                    <td>{{ number_format($hasil['leadership'], 4) }}</td>
                    <td>{{ number_format($hasil['impulse'], 4) }}</td>
                    <td>{{ number_format($hasil['killing_blow'], 4) }}</td>
                    <td>{{ number_format($hasil['camouflage'], 4) }}</td>
                    <td>{{ number_format($hasil['impact'], 4) }}</td>
                    <td>{{ number_format($hasil['mobility'], 4) }}</td>
                    <td>{{ number_format($hasil['scouting'], 4) }}</td>
                    <td>{{ number_format($hasil['total'], 4) }}</td>
                    <td>{{ $index + 1 }}</td>
                </tr>
                @endforeach --}}
                <tr>
                    <td>max</td>
                    <td>3,45</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>wahid</td>
                    <td>3,33</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
