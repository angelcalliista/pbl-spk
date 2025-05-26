<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return response()->json($kriterias);
    }

    public function show($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return response()->json($kriteria);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_aspek' => 'required|integer',
            'kode' => 'required|string|max:255',
            'nama_kriteria' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'factor' => 'required|integer',
        ]);

        $kriteria = Kriteria::create($request->all());
        return response()->json($kriteria, 201);
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $request->validate([
            'id_aspek' => 'required|integer',
            'kode' => 'required|string|max:255',
            'nama_kriteria' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'factor' => 'required|integer',
        ]);

        $kriteria->update($request->all());
        return response()->json($kriteria);
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        return response()->json(null, 204);
    }
}