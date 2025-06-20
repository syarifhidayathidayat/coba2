<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use Illuminate\Http\Request;

class InstitusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institusis = \App\Models\Institusi::all();
        return view('institusi.index', compact('institusis'));
    }

    public function create()
    {
        return view('institusi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_institusi' => 'required',
            'alamat' => 'required',
            'sp_dipa' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        $data = $request->all();
        $institusi = \App\Models\Institusi::create([
            'nama_institusi' => $data['nama_institusi'],
            'alamat' => $data['alamat'],
            'nama_ppk_52' => $data['nama_ppk_52'] ?? null,
            'nip_ppk_52' => $data['nip_ppk_52'] ?? null,
            'nama_ppk_53' => $data['nama_ppk_53'] ?? null,
            'nip_ppk_53' => $data['nip_ppk_53'] ?? null,
            'nama_pejabat_pengadaan_52' => $data['nama_pejabat_pengadaan_52'] ?? null,
            'nip_pejabat_pengadaan_52' => $data['nip_pejabat_pengadaan_52'] ?? null,
            'nama_pejabat_pengadaan_53' => $data['nama_pejabat_pengadaan_53'] ?? null,
            'nip_pejabat_pengadaan_53' => $data['nip_pejabat_pengadaan_53'] ?? null,
            'nama_bendahara' => $data['nama_bendahara'] ?? null,
            'nip_bendahara' => $data['nip_bendahara'] ?? null,
            'dipa' => $data['dipa'] ?? null,
            'sp_dipa' => $data['sp_dipa'] ?? null,
        ]);
        // Upload file jika ada
        if ($request->hasFile('sp_dipa')) {
            $data['sp_dipa'] = $request->file('sp_dipa')->store('sp_dipa_files', 'public');
        }

        Institusi::create($data);

        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil ditambahkan');
    }


    public function show(Institusi $institusi)
    {
        //
    }


    public function edit($id)
    {
        $institusi = \App\Models\Institusi::findOrFail($id);
        return view('institusi.edit', compact('institusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_institusi' => 'required',
            'alamat' => 'required',
            'sp_dipa' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        $institusi = \App\Models\Institusi::findOrFail($id);
        $data = $request->all();
        $institusi->update([
            'nama_institusi' => $data['nama_institusi'],
            'alamat' => $data['alamat'],
            'nama_ppk_52' => $data['nama_ppk_52'] ?? null,
            'nip_ppk_52' => $data['nip_ppk_52'] ?? null,
            'nama_ppk_53' => $data['nama_ppk_53'] ?? null,
            'nip_ppk_53' => $data['nip_ppk_53'] ?? null,
            'nama_pejabat_pengadaan_52' => $data['nama_pejabat_pengadaan_52'] ?? null,
            'nip_pejabat_pengadaan_52' => $data['nip_pejabat_pengadaan_52'] ?? null,
            'nama_pejabat_pengadaan_53' => $data['nama_pejabat_pengadaan_53'] ?? null,
            'nip_pejabat_pengadaan_53' => $data['nip_pejabat_pengadaan_53'] ?? null,
            'nama_bendahara' => $data['nama_bendahara'] ?? null,
            'nip_bendahara' => $data['nip_bendahara'] ?? null,
            'dipa' => $data['dipa'] ?? null,
            'sp_dipa' => $data['sp_dipa'] ?? null,
            'tanggal_mulai' => $data['tanggal_mulai'] ?? null,
            'tanggal_selesai' => $data['tanggal_selesai'] ?? null,
        ]);
        // Upload file baru jika ada
        if ($request->hasFile('sp_dipa')) {
            // Hapus file lama jika ada
            if ($institusi->sp_dipa && \Storage::disk('public')->exists($institusi->sp_dipa)) {
                \Storage::disk('public')->delete($institusi->sp_dipa);
            }

            // Simpan file baru
            $data['sp_dipa'] = $request->file('sp_dipa')->store('sp_dipa_files', 'public');
        }

        $institusi->update($data);

        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil diupdate');
    }


    public function destroy($id)
    {
        $institusi = \App\Models\Institusi::findOrFail($id);
        // Hapus file dari storage jika ada
        if ($institusi->sp_dipa && \Storage::disk('public')->exists($institusi->sp_dipa)) {
            \Storage::disk('public')->delete($institusi->sp_dipa);
        }
        $institusi->delete();
        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil dihapus');
    }
}
