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
    <form method="GET" action="{{ url('/nilai-profile') }}" class="mb-3">
        <div class="form-group">
            <label for="aspek_id">Pilih Aspek</label>
            <select name="aspek_id" id="aspek_id" class="form-control" onchange="this.form.submit()">
                <option value="">Pilih Aspek</option>
                @foreach($aspekList as $aspek)
                    <option value="{{ $aspek->id }}" {{ $selectedAspekId == $aspek->id ? 'selected' : '' }}>
                        {{ $aspek->kode }} - {{ $aspek->nama_aspek }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    @if(!empty($selectedAspekId) && count($kriteriaList) > 0)
        {{-- Form Input Nilai Profile --}}
        <form method="POST" action="{{ route('nilai_profile.save', ['aspek' => $selectedAspekId]) }}">
            @csrf

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Alternatif / Kriteria</th>
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
                                    $nilai = old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilaiProfiles[$alternatif->id][$kriteria->id]->nilai_profile ?? '');
                                @endphp
                                <td>
                                    <input type="number" name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]" 
                                        value="{{ $nilai }}" 
                                        min="1" max="9" class="form-control @error('nilai.' . $alternatif->id . '.' . $kriteria->id) is-invalid @enderror" />
                                    @error('nilai.' . $alternatif->id . '.' . $kriteria->id)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    @else
        <div class="alert alert-info">Silahkan pilih aspek terlebih dahulu.</div>
    @endif

    {{-- <form method="POST" action="{{ url('/nilai-profile/save')" }}>
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