<?php

namespace App\Http\Controllers;

use App\Models\Penempatan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Penempatan::all();
        return view('penempatan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('penempatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:jurusans,nama',
        ]);

        Penempatan::create($request->all());
        return redirect()->route('penempatan.index')->with('success', 'Data penempatan berhasil disimpan.');
    }

    public function edit(Penempatan $penempatan)
    {
        return view('penempatan.edit', compact('penempatan'));
    }

    public function update(Request $request, Penempatan $penempatan)
    {
        $request->validate([
            'nama' => 'required|unique:jurusans,nama,' . $penempatan->id,
        ]);

        $penempatan->update($request->all());
        return redirect()->route('penempatan.index')->with('success', 'Data penempatan berhasil diperbarui.');
    }

    public function destroy(Penempatan $penempatan)
    {
        $penempatan->delete();
        return redirect()->route('penempatan.index')->with('success', 'Data penempatan berhasil dihapus.');
    }
}
