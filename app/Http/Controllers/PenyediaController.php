<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use Illuminate\Http\Request;

class PenyediaController extends Controller
{
    public function index()
    {
        $penyedias = Penyedia::all();
        return view('penyedia.index', compact('penyedias'));
    }

    public function create()
    {
        return view('penyedia.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penyedia' => 'required|string|max:255',
            'npwp' => 'required|string',
            'rekening' => 'required|string',
            'alamat' => 'required|string',
            'dokumen_npwp' => 'file|mimes:pdf,jpg,png|max:2048',
            'dokumen_ktp' => 'file|mimes:pdf,jpg,png|max:2048',
            'dokumen_rekening_koran' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('dokumen_npwp')) {
            $validated['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_ktp')) {
            $validated['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_rekening_koran')) {
            $validated['dokumen_rekening_koran'] = $request->file('dokumen_rekening_koran')->store('dokumen_penyedia', 'public');
        }

        Penyedia::create($validated);
        return redirect()->route('penyedia.index')->with('success', 'Data penyedia berhasil disimpan.');
    }

    public function edit(Penyedia $penyedia)
    {
        return view('penyedia.edit', compact('penyedia'));
    }

    public function update(Request $request, Penyedia $penyedia)
    {
        $validated = $request->validate([
            'nama_penyedia' => 'required|string|max:255',
            'npwp' => 'required|string',
            'rekening' => 'required|string',
            'alamat' => 'required|string',
            'dokumen_npwp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_ktp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_rekening_koran' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('dokumen_npwp')) {
            $validated['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_ktp')) {
            $validated['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_rekening_koran')) {
            $validated['dokumen_rekening_koran'] = $request->file('dokumen_rekening_koran')->store('dokumen_penyedia', 'public');
        }

        $penyedia->update($validated);
        return redirect()->route('penyedia.index')->with('success', 'Data penyedia berhasil diperbarui.');
    }

    public function destroy(Penyedia $penyedia)
    {
        $penyedia->delete();
        return redirect()->route('penyedia.index')->with('success', 'Data penyedia berhasil dihapus.');
    }
}
