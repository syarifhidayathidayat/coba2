<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'nullable|unique:pegawais',
            'jabatan' => 'required',
            'email' => 'nullable|email'
        ]);

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil disimpan.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'nullable|unique:pegawais,nip,' . $pegawai->id,
            'jabatan' => 'required',
            'email' => 'nullable|email'
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}

