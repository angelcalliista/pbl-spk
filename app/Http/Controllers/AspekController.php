<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    public function index()
    {
        $aspeks = Aspek::all();
        return response()->json($aspeks);
    }

    public function show($id)
    {
        $aspek = Aspek::findOrFail($id);
        return response()->json($aspek);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama_aspek' => 'required|string|max:255',
            'persentase' => 'required|numeric',
        ]);

        $aspek = Aspek::create($request->all());
        return response()->json($aspek, 201);
    }

    public function update(Request $request, $id)
    {
        $aspek = Aspek::findOrFail($id);

        $request->validate([
            'kode' => 'required|string|max:255',
            'nama_aspek' => 'required|string|max:255',
            'persentase' => 'required|numeric',
        ]);

        $aspek->update($request->all());
        return response()->json($aspek);
    }

    public function destroy($id)
    {
        $aspek = Aspek::findOrFail($id);
        $aspek->delete();
        return response()->json(null, 204);
    }
}
