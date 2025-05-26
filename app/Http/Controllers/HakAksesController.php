<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index()
    {
        $hakAkses = HakAkses::with(['user', 'menu'])->get();
        return response()->json($hakAkses);
    }

    public function show($id)
    {
        $hakAkses = HakAkses::with(['user', 'menu'])->findOrFail($id);
        return response()->json($hakAkses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'id_menu' => 'required|integer',
        ]);

        $hakAkses = HakAkses::create($request->all());
        return response()->json($hakAkses, 201);
    }

    public function update(Request $request, $id)
    {
        $hakAkses = HakAkses::findOrFail($id);

        $request->validate([
            'id_user' => 'required|integer',
            'id_menu' => 'required|integer',
        ]);

        $hakAkses->update($request->all());
        return response()->json($hakAkses);
    }

    public function destroy($id)
    {
        $hakAkses = HakAkses::findOrFail($id);
        $hakAkses->delete();
        return response()->json(null, 204);
    }
}

