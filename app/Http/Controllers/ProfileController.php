<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profiles = Profile::all();
        $kriteriaList = Kriteria::all();
        $aspekList = Aspek::orderBy('kode')->get();
        $selectedAspekId = $request->query('aspek_id');

        if ($selectedAspekId) {
            $kriteriaList = Kriteria::where('id_aspek', $selectedAspekId)->orderBy('kode')->get();
        } else {
            $kriteriaList = collect();
        }

        $alternatifList = Alternatif::orderBy('kode')->get();

        $nilaiProfiles = [];
        foreach ($profiles as $np) {
            if (isset($np->id_alternatif) && isset($np->id_kriteria)) {
                 $nilaiProfiles[$np->id_alternatif][$np->id_kriteria] = $np;
            }
        }

        return view('nilai-profile', compact('aspekList', 'selectedAspekId', 'kriteriaList', 'alternatifList', 'nilaiProfiles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nilai' => 'required|array',
            'nilai.*.*' => 'required|integer|min:1|max:9',
        ]);

        foreach ($validated['nilai'] as $id_alternatif => $kriteria_values) {
            foreach ($kriteria_values as $id_kriteria => $nilai_profile) {
                Profile::updateOrCreate(
                    [
                        'id_alternatif' => $id_alternatif,
                        'id_kriteria' => $id_kriteria,
                    ],
                    [
                        'nilai_profile' => $nilai_profile,
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Data nilai profile berhasil disimpan.');
    }
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return response()->json($profile);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'id_alternatif' => 'required|integer',
            'id_kriteria' => 'required|integer',
            'nilai_profile' => 'required|numeric',
        ]);

        $profile->update($request->all());
        return response()->json($profile);
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return response()->json(null, 204);
    }
}
