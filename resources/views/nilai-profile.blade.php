@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nilai Profile</h3>

    {{-- <form method="GET" action="{{ route('nilai_profile') }}" class="mb-3">
        <div class="form-group">
            <label for="aspek_id">Pilih Aspek</label>
            <select name="aspek_id" id="aspek_id" class="form-control" onchange="this.form.submit()">
                <option value="">Pilih Aspek</option>
                @foreach($aspekList as $aspek)
                    <option value="{{ $aspek->id }}" {{ $selectedAspekId == $aspek->id ? 'selected' : '' }}>
                        {{ $aspek->kode_aspek }} - {{ $aspek->nama_aspek }}
                    </option>
                @endforeach
            </select>
        </div>
    </form> --}}
    <form method="GET"  class="mb-3">
        <div class="form-group">
            <label for="aspek_id">Pilih Aspek</label>
            <select name="aspek_id" id="aspek_id" class="form-control" onchange="this.form.submit()">
                <option value="">Pilih Aspek</option>
                <option value="">Hardskill</option>
                <option value="">Softskill</option>
            </select>
        </div>
    </form>

    <form method="POST">
        @csrf
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Alternatif/Kriteria</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>joker</td>
                            <td>
                                <input type="number" name="nilai" 
                                    value="2" 
                                    min="1" max="5" class="form-control" />
                            </td>
                    </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    {{-- <form method="POST" action="{{ route('nilai_profile.save') }}">
        @csrf
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Alternatif/Kriteria</th>
                    @foreach($kriteriaList as $kriteria)
                        <th>{{ $kriteria->nama_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatifList as $alternatif)
                    <tr>
                        <td>{{ $alternatif->nama_alternatif }}</td>
                        @foreach($kriteriaList as $kriteria)
                            @php
                                $key = $alternatif->id . '-' . $kriteria->id;
                                $nilai = $nilaiProfiles[$key][0]->nilai ?? '';
                            @endphp
                            <td>
                                <input type="number" name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]" 
                                    value="{{ old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilai) }}" 
                                    min="1" max="9" class="form-control" />
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form> --}}
</div>
@endsection
