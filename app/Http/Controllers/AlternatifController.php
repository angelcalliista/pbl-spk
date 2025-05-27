<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        // return response()->json($alternatifs);
        return view('alternatif');
    }
    /*
    public function show($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return response()->json($alternatif);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama_alternatif' => 'required|string|max:255',
        ]);

        $alternatif = Alternatif::create($request->all());
        return response()->json($alternatif, 201);
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        $request->validate([
            'kode' => 'required|string|max:255',
            'nama_alternatif' => 'required|string|max:255',
        ]);

        $alternatif->update($request->all());
        return response()->json($alternatif);
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();
        return response()->json(null, 204);
    }
        */
}
