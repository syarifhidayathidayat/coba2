<?php

namespace App\Http\Controllers;

use App\Models\Penempatan;
use Illuminate\Http\Request;

class PenempatanController extends Controller
{
    public function index()
    {
        $penempatans = Penempatan::all();
        return view('penempatan.index', compact('penempatans'));
    }

    public function create()
    {
        return view('penempatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:penempatans,nama',
        ]);

        Penempatan::create($request->all());
        return redirect()->route('penempatan.index')->with('success', 'Data penempatan berhasil disimpan.');
    }

    public function edit(Penempatan $penempatans)
    {
        return view('penempatan.edit', compact('penempatans'));
    }

    public function update(Request $request, Penempatan $penempatans)
    {
        $request->validate([
            'nama' => 'required|unique:penempatans,nama,' . $penempatans->id,
        ]);

        $penempatans->update($request->all());
        return redirect()->route('penempatan.index')->with('success', 'Data penempatan berhasil diperbarui.');
    }

    public function destroy(Penempatan $penempatans)
    {
        $penempatans->delete();
        return redirect()->route('penempatan.index')->with('success', 'Data penempatan berhasil dihapus.');
    }
}
