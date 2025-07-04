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
            'upload_sk_pejabat' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        $data = $request->all();
        // Upload file jika ada
        if ($request->hasFile('sp_dipa')) {
            $data['sp_dipa'] = $request->file('sp_dipa')->store('sp_dipa_files', 'public');
        }
        if ($request->hasFile('upload_sk_pejabat')) {
            $data['upload_sk_pejabat'] = $request->file('upload_sk_pejabat')->store('sk_pejabat_files', 'public');
        }
        \App\Models\Institusi::create([
            'nama_institusi' => $data['nama_institusi'],
            'alamat' => $data['alamat'],
            'notelp' => $data['no_telp'] ?? null,
            'fax' => $data['fax'] ?? null,
            'kode_institusi' => $data['kode_institusi'] ?? null,
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
            'tanggal_sp_dipa' => $data['tanggal_sp_dipa'] ?? null,
            'no_sk_pejabat' => $data['no_sk_pejabat'] ?? null,
            'tanggal_sk_pejabat' => $data['tanggal_sk_pejabat'] ?? null,
            'upload_sk_pejabat' => $data['upload_sk_pejabat'] ?? null,
            'tanggal_mulai' => $data['tanggal_mulai'] ?? null,
            'tanggal_selesai' => $data['tanggal_selesai'] ?? null,
        ]);
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
            'upload_sk_pejabat' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        $institusi = \App\Models\Institusi::findOrFail($id);
        $data = $request->all();
        // Handle file SP DIPA
        if ($request->hasFile('sp_dipa')) {
            if ($institusi->sp_dipa && \Storage::disk('public')->exists($institusi->sp_dipa)) {
                \Storage::disk('public')->delete($institusi->sp_dipa);
            }
            $data['sp_dipa'] = $request->file('sp_dipa')->store('sp_dipa_files', 'public');
        }
        // Handle file SK Pejabat
        if ($request->hasFile('upload_sk_pejabat')) {
            if ($institusi->upload_sk_pejabat && \Storage::disk('public')->exists($institusi->upload_sk_pejabat)) {
                \Storage::disk('public')->delete($institusi->upload_sk_pejabat);
            }
            $data['upload_sk_pejabat'] = $request->file('upload_sk_pejabat')->store('sk_pejabat_files', 'public');
        }
        $institusi->update([
            'nama_institusi' => $data['nama_institusi'],
            'alamat' => $data['alamat'],
            'no_telp' => $data['no_telp'] ?? null,
            'fax' => $data['fax'] ?? null,
            'kode_institusi' => $data['kode_institusi'] ?? null,
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
            'sp_dipa' => $data['sp_dipa'] ?? $institusi->sp_dipa,
            'tanggal_sp_dipa' => $data['tanggal_sp_dipa'] ?? null,
            'no_sk_pejabat' => $data['no_sk_pejabat'] ?? null,
            'tanggal_sk_pejabat' => $data['tanggal_sk_pejabat'] ?? null,
            'upload_sk_pejabat' => $data['upload_sk_pejabat'] ?? $institusi->upload_sk_pejabat,
            'tanggal_mulai' => $data['tanggal_mulai'] ?? null,
            'tanggal_selesai' => $data['tanggal_selesai'] ?? null,
        ]);
        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil diupdate');
    }
    public function destroy($id)
    {
        $institusi = \App\Models\Institusi::findOrFail($id);
        // Hapus file SP DIPA
        if ($institusi->sp_dipa && \Storage::disk('public')->exists($institusi->sp_dipa)) {
            \Storage::disk('public')->delete($institusi->sp_dipa);
        }
        // Hapus file SK Pejabat
        if ($institusi->upload_sk_pejabat && \Storage::disk('public')->exists($institusi->upload_sk_pejabat)) {
            \Storage::disk('public')->delete($institusi->upload_sk_pejabat);
        }
        $institusi->delete();
        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil dihapus');
    }
}
