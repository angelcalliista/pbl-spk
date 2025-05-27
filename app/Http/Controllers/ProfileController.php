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
        // Ambil semua kriteria
        $kriteriaList = Kriteria::all();

        // ambil data spek
        $aspekList = Aspek::all();
        $selectedAspekId = $request->query('aspek_id');

        // Ambil kriteria berdasarkan aspek yang dipilih, atau semua jika tidak ada aspek dipilih
        if ($selectedAspekId) {
            $kriteriaList = Kriteria::where('id_aspek', $selectedAspekId)->get();
        } else {
            $kriteriaList = Kriteria::all();
        }

        // Ambil semua alternatif
        $alternatifList = Alternatif::all();

        // Susun array multidimensi untuk akses mudah di view
        $nilaiProfiles = [];
        foreach ($profiles as $np) {
            $nilaiProfiles[$np->id_alternatif][$np->id_kriteria] = $np;
        }

        // return response()->json($profiles);
        return view('nilai-profile', compact('aspekList', 'selectedAspekId', 'kriteriaList', 'alternatifList', 'nilaiProfiles'));
    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return response()->json($profile);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nilai' => 'required|array',
            'nilai.*.*' => 'required|integer|min:1|max:9',
        ]);
    
        foreach ($validated['nilai'] as $id_alternatif => $kriteria_values) {
            foreach ($kriteria_values as $id_kriteria => $nilai_profile) {
                // Simpan atau update data ke tabel profile
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
