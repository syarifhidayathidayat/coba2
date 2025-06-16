<?php

namespace App\Http\Controllers;

use App\Models\PaketPekerjaan;
use Illuminate\Http\Request;

class PaketPekerjaanController extends Controller
{
    public function index()
    {
        $paketPekerjaan = PaketPekerjaan::latest()->paginate(10);
        
        // Hitung ulang realisasi dan sisa pagu untuk setiap paket
        foreach($paketPekerjaan as $paket) {
            // Hitung total kontrak dari SP yang memiliki nama paket yang sama
            $totalKontrak = \App\Models\Sp::where('nama_paket', $paket->nama_paket)
                ->sum('total_kontrak');
            
            // Update realisasi dengan total kontrak
            $paket->realisasi = $totalKontrak;
            
            // Update sisa pagu
            $paket->sisa_pagu = $paket->pagu - $totalKontrak;
        }

        return view('paket-pekerjaan.index', compact('paketPekerjaan'));
    }

    public function create()
    {
        return view('paket-pekerjaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'tahun_anggaran' => 'required',
            'max' => 'required',
            'kode_rup' => 'required',
            'pagu' => 'required|numeric',
            'qty' => 'required|numeric',
            'outstanding_kontrak' => 'required|numeric',
            'jenis_akun' => 'required',
        ]);

        // Hitung realisasi dari total kontrak di tabel SP
        $totalKontrak = \App\Models\Sp::where('nama_paket', $request->nama_paket)
            ->sum('total_kontrak');

        // Hitung sisa pagu
        $sisaPagu = $request->pagu - $totalKontrak;

        $data = $request->all();
        $data['realisasi'] = $totalKontrak;
        $data['sisa_pagu'] = $sisaPagu;

        PaketPekerjaan::create($data);
        return redirect()->route('paket-pekerjaan.index')
            ->with('success', 'Paket Pekerjaan berhasil ditambahkan.');
    }

    public function show(PaketPekerjaan $paketPekerjaan)
    {
        return view('paket-pekerjaan.show', compact('paketPekerjaan'));
    }

    public function edit(PaketPekerjaan $paketPekerjaan)
    {
        return view('paket-pekerjaan.edit', compact('paketPekerjaan'));
    }

    public function update(Request $request, PaketPekerjaan $paketPekerjaan)
    {
        $request->validate([
            'nama_paket' => 'required',
            'max' => 'required',
            'kode_rup' => 'required',
            'pagu' => 'required|numeric',
            'qty' => 'required|numeric',
            'outstanding_kontrak' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'sisa_pagu' => 'required|numeric',
            'jenis_akun' => 'required',
        ]);

        $paketPekerjaan->update($request->all());
        return redirect()->route('paket-pekerjaan.index')
            ->with('success', 'Paket Pekerjaan berhasil diperbarui.');
    }

    public function destroy(PaketPekerjaan $paketPekerjaan)
    {
        $paketPekerjaan->delete();
        return redirect()->route('paket-pekerjaan.index')
            ->with('success', 'Paket Pekerjaan berhasil dihapus.');
    }
}
