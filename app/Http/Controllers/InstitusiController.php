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

    /**
     * Show the form for creating a new resource.
     */
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
        ]);
        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institusi $institusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
        ]);
        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $institusi = \App\Models\Institusi::findOrFail($id);
        $institusi->delete();
        return redirect()->route('institusi.index')->with('success', 'Data institusi berhasil dihapus');
    }
}
