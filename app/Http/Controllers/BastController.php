<?php

namespace App\Http\Controllers;

use App\Models\Bast;
use App\Models\Sp;
use App\Models\Barang;
use App\Models\Institusi;
use Illuminate\Http\Request;
use PDF;

class BastController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('Penyedia')) {
            $penyedia = auth()->user()->penyedia;

            // Cek jika belum punya relasi penyedia
            if (!$penyedia) {
                return back()->with('error', 'Profil penyedia belum lengkap.');
            }

            // Ambil BAST milik penyedia
            $basts = \App\Models\Bast::whereHas('sp', function ($query) use ($penyedia) {
                $query->where('penyedia_id', $penyedia->id);
            })->with('sp')->latest()->get();
        } else {
            // Role lain bisa lihat semua
            $basts = \App\Models\Bast::with('sp')->latest()->get();
        }

        return view('bast.index', compact('basts'));
    }

    public function create(Sp $sp)
    {
        return view('bast.create', compact('sp'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'sp_id' => 'required|exists:sps,id',
            'tanggal_bast' => 'required|date',
            'nomor_bast' => 'required|unique:basts',
            'nomor_bap' => 'required|unique:basts',
            'nomor_bapem' => 'required|unique:basts',
            'no_kwitansi' => 'nullable|unique:basts',
            'status' => 'required',
            'keterangan' => 'nullable',
            'barang_id' => 'required|array',
            'barang_id.*' => 'required|exists:barangs,id',
            'jumlah_serah_terima' => 'required|array',
            'jumlah_serah_terima.*' => 'required|integer|min:1',
            'kondisi' => 'required|array',
            'kondisi.*' => 'required|string',
            'keterangan_barang' => 'nullable|array',
            'keterangan_barang.*' => 'nullable|string'
        ]);
        $bast = Bast::create($request->all());
        // Simpan data barang
        foreach ($request->barang_id as $index => $barangId) {
            $bast->barangs()->attach($barangId, [
                'jumlah_serah_terima' => $request->jumlah_serah_terima[$index],
                'kondisi' => $request->kondisi[$index],
                'keterangan' => $request->keterangan_barang[$index] ?? null
            ]);
        }
        return redirect()->route('bast.index')
            ->with('success', 'BAST berhasil dibuat');
    }
    public function show(Bast $bast)
    {
        return view('bast.show', compact('bast'));
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
    public function printBast($id)
    {
        $bast = Bast::with(['sp', 'barangs'])->findOrFail($id);
        $tanggal = $bast->tanggal_bast;
        $institusi = \App\Models\Institusi::where('tanggal_mulai', '<=', $tanggal)
            ->where('tanggal_selesai', '>=', $tanggal)
            ->first();
        $pdf = PDF::loadView('bast.print.bast', compact('bast', 'institusi'));
        $filename = 'BAST-' . str_replace('/', '-', $bast->nomor_bast) . '.pdf';
        return $pdf->stream($filename);
    }
    public function printBap($id)
    {
        $bast = Bast::with(['sp', 'barangs'])->findOrFail($id);
        $tanggal = $bast->tanggal_bast;
        $institusi = \App\Models\Institusi::where('tanggal_mulai', '<=', $tanggal)
            ->where('tanggal_selesai', '>=', $tanggal)
            ->first();
        $pdf = PDF::loadView('bast.print.bap', compact('bast', 'institusi'));
        $filename = 'BA Pemeriksaan -' . str_replace('/', '-', $bast->nomor_bap) . '.pdf';
        return $pdf->stream($filename);
    }
    public function printBapem($id)
    {
        $bast = Bast::with(['sp', 'barangs'])->findOrFail($id);
        $tanggal = $bast->tanggal_bast;
        $institusi = \App\Models\Institusi::where('tanggal_mulai', '<=', $tanggal)
            ->where('tanggal_selesai', '>=', $tanggal)
            ->first();
        $pdf = PDF::loadView('bast.print.bapem', compact('bast', 'institusi'));
        $filename = 'BA Pemeriksaan -' . str_replace('/', '-', $bast->nomor_bapem) . '.pdf';
        return $pdf->stream($filename);
    }
    public function printKwitansi($id)
    {
        $bast = Bast::with(['sp', 'barangs'])->findOrFail($id);
        $tanggal = $bast->tanggal_bast;
        $institusi = \App\Models\Institusi::where('tanggal_mulai', '<=', $tanggal)
            ->where('tanggal_selesai', '>=', $tanggal)
            ->first();
        $pdf = PDF::loadView('bast.print.kwitansi', compact('bast', 'institusi'));
        $filename = 'Kwitansi -' . str_replace('/', '-', $bast->nomor_kwitansi) . '.pdf';
        return $pdf->stream($filename);
    }
    public function printSsp(Bast $bast)
    {
        $bast->load([
            'sp.penyedia',
            'barangs' => function ($query) {
                $query->withPivot('jumlah_serah_terima', 'kondisi', 'keterangan');
            }
        ]);
        $tanggal = $bast->tanggal_bast;
        $institusi = \App\Models\Institusi::where('tanggal_mulai', '<=', $tanggal)
            ->where('tanggal_selesai', '>=', $tanggal)
            ->first();
        return view('bast.print.ssp', compact('bast', 'institusi'));
    }
}
