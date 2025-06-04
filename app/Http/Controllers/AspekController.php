<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    public function index()
    {
        $aspek = Aspek::all();
        return view('aspek.index', compact('aspek'));
    }

    public function show($id)
    {
        $aspek = Aspek::findOrFail($id);
        return response()->json($aspek);
    }

    //tambah aspek
    public function create()
    {
        return view('aspek.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'persentase' => 'required|numeric',
        ]);
        $totalPresentase = Aspek::sum('persentase');
        if ($totalPresentase + $request->persentase > 100) {
            return redirect()->back()->with('error', 'Total presentase tidak boleh melebihi 100.');
        }
        // cek apakah penambahan presentase baru melebihi 100%
        if($request->persentase + $totalPresentase > 100) {
            return redirect()->back()->with('error', 'Total presentase tidak boleh melebihi 100.');
        }

        Aspek::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'persentase' => $request->persentase,
        ]);

        return redirect()->route('admin.aspek.index')->with('success', 'Aspek berhasil ditambahkan.');

    }

    public function edit(Aspek $aspek)
    {
        return view('aspek.edit', compact('aspek'));
    }

    public function update(Request $request, Aspek $aspek)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:alternatifs,kode,' . $aspek->id,
            'nama' => 'required|string|max:255',
            'persentase' => 'required|numeric',
        ]);

        $aspek->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'persentase' => $request->persentase,
        ]);

        return redirect()->route('admin.aspek.index')->with('success', 'Alternatif berhasil diupdate.');
    }

    public function destroy(Aspek $aspek)
    {
        $aspek->delete();
        return redirect()->route('admin.aspek.index')->with('success', 'Alternatif berhasil dihapus.');
    }
}
