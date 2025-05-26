<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return response()->json($profiles);
    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return response()->json($profile);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alternatif' => 'required|integer',
            'id_kriteria' => 'required|integer',
            'nilai_profile' => 'required|numeric',
        ]);

        $profile = Profile::create($request->all());
        return response()->json($profile, 201);
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
