<?php

namespace App\Http\Controllers;

use App\Models\Penempatan;
use Illuminate\Http\Request;

class PenempatanController extends Controller
{
    public function index()
    {
        // dd(Penempatan::all());
        $penempatans = Penempatan::all(); // Ambil ulang semua data
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

    public function edit($id)
    {
        $penempatan = Penempatan::findOrFail($id);
        return view('penempatan.edit', compact('penempatan'));
    }


    public function update(Request $request, Penempatan $penempatan)
    {
        $request->validate([
            'nama' => 'required|unique:penempatans,nama,' . $penempatan->id,
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
