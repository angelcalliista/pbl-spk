<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Aspek;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        // $kriterias = Kriteria::all();
        // return response()->json($kriterias);
        // return view('kriteria');
        $kriterias = Kriteria::with('aspek')->get();
        return view('kriteria.index', compact('kriterias')); // Sesuaikan path view

    }

    public function show($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return response()->json($kriteria);
    }

     public function create()
    {
        $aspeks = Aspek::all();
        return view('kriteria.create', compact('aspeks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_aspek' => 'required|integer',
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'factor' => 'required|integer',
        ]);
        Kriteria::create([
            'id_aspek' => $request->id_aspek,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'factor' => $request->factor,
        ]);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit(Kriteria $kriterium)
    {
        $aspeks = Aspek::orderBy('kode')->get();
        return view('kriteria.edit', compact('kriterium', 'aspeks'));
    }
    public function update(Request $request, Kriteria $kriterium) // Route Model Binding
    {
        $validatedData = $request->validate([
            'id_aspek' => 'required|integer',
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:1|max:5',
            'factor' => 'required|integer',
        ]);
         $kriterium->update($validatedData);

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');

    }

    public function destroy(Kriteria $kriterium)
    {
        $kriterium->delete();
        return redirect()->route('admin.kriteria.index')->with('success', 'Alternatif berhasil dihapus.');
    }
}
