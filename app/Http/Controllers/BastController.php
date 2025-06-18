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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basts = Bast::with('sp')->latest()->get();
        return view('bast.index', compact('basts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Sp $sp)
    {
        return view('bast.create', compact('sp'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Bast $bast)
    {
        return view('bast.show', compact('bast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function printBast($id)
    {
        $bast = Bast::with(['sp', 'barangs'])->findOrFail($id);
        $institusi = Institusi::first();
        $pdf = PDF::loadView('bast.print.bast', compact('bast', 'institusi'));
        $filename = 'BAST-' . str_replace('/', '-', $bast->nomor_bast) . '.pdf';
        return $pdf->stream($filename);
    }
    public function printBap($id)
    {
        $bast = Bast::with(['sp', 'barangs'])->findOrFail($id);
        $institusi = Institusi::first();
        $pdf = PDF::loadView('bast.print.bap', compact('bast', 'institusi'));
        $filename = 'BA Pemeriksaan -' . str_replace('/', '-', $bast->nomor_bap) . '.pdf';
        return $pdf->stream($filename);
    }

    public function printBapem($id)
    {
        $bast = Bast::with(['sp', 'barangs'])->findOrFail($id);
        $institusi = Institusi::first();
        $pdf = PDF::loadView('bast.print.bapem', compact('bast', 'institusi'));
        $filename = 'BA Pemeriksaan -' . str_replace('/', '-', $bast->nomor_bapem) . '.pdf';
        return $pdf->stream($filename);
    }



    // public function printBapem(Bast $bast)
    // {
    //     $bast->load([
    //         'sp.penyedia',
    //         'barangs' => function($query) {
    //             $query->withPivot('jumlah_serah_terima', 'kondisi', 'keterangan');
    //         }
    //     ]);
    //     return view('bast.print.bapem', compact('bast'));
    // }

    public function printKwitansi(Bast $bast)
    {
        $bast->load([
            'sp.penyedia',
            'barangs' => function($query) {
                $query->withPivot('jumlah_serah_terima');
            }
        ]);

        if (!$bast->sp) {
            return 'Data SP tidak ditemukan';
        }

        if (!$bast->barangs || count($bast->barangs) === 0) {
            return 'Data barang tidak ditemukan';
        }

        return view('bast.print.kwitansi', compact('bast'));
    }
}
