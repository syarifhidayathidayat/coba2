<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Sp;
use Illuminate\Http\Request;
use App\Models\Penempatan;

class BarangController extends Controller
{
    public function create($id)
    {
        $sp = Sp::findOrFail($id);
        $penempatans = Penempatan::all();
        return view('barang.create', compact('sp', 'penempatans'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_barang.*'    => 'required|string',
            'harga.*'          => 'nullable|numeric|min:0',
            'ongkos_kirim.*'   => 'nullable|numeric|min:0',
            'penempatan_id.*'  => 'required|array',
            'qty_penempatan.*' => 'required|array',
        ]);
        $sp = Sp::findOrFail($id);
        foreach ($request->nama_barang as $barangIndex => $nama) {
            $harga         = $request->harga[$barangIndex] ?? 0;
            $ongkos_kirim  = $request->ongkos_kirim[$barangIndex] ?? 0;
            $qtyTotal      = 0;
            // Penempatan per barang
            $penempatanIds = $request->penempatan_id[$barangIndex] ?? [];
            $qtyPenempatans = $request->qty_penempatan[$barangIndex] ?? [];
            foreach ($penempatanIds as $pIndex => $penempatanId) {
                $qty = $qtyPenempatans[$pIndex] ?? 0;
                $qtyTotal += $qty;
                $total = $qty * $harga;
                Barang::create([
                    'sp_id'         => $sp->id,
                    'nama_barang'   => $nama,
                    'qty'           => $qty,
                    'harga'         => $harga,
                    'total'         => $total,
                    'ongkos_kirim'  => $ongkos_kirim,
                    'penempatan_id' => $penempatanId,
                ]);
            }
        }
        // Tambahkan pemanggilan update total kontrak
        $sp->updateTotalKontrak();
        return redirect()->route('sp.index')->with('success', 'Data barang berhasil disimpan.');
    }
    public function indexSemuaBarang()
    {
        $tahun = session('tahun', now()->year);
        $barangs = Barang::with('sp')
            ->whereHas('sp', function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            })
            ->latest()
            ->get();
        $pageTitle = "Daftar Semua barang Akun 52 - Tahun $tahun";
        return view('barang.semua', compact('barangs','pageTitle'));
    }
    public function edit($sp_id, $nama_barang)
    {
        $sp = Sp::findOrFail($sp_id);
        $penempatans = Penempatan::all();
        $barangs = Barang::where('sp_id', $sp_id)->where('nama_barang', $nama_barang)->get();
        return view('barang.edit', compact('sp', 'penempatans', 'barangs', 'nama_barang'));
    }
    public function update(Request $request, $sp_id, $nama_barang)
    {
        $request->validate([
            'nama_barang'    => 'required|string',
            'harga'          => 'nullable|numeric|min:0',
            'ongkos_kirim'   => 'nullable|numeric|min:0',
            'penempatan_id'  => 'required|array',
            'qty_penempatan' => 'required|array',
        ]);
        $sp = Sp::findOrFail($sp_id);
        $oldBarangs = Barang::where('sp_id', $sp_id)->where('nama_barang', $nama_barang)->get();
        $initialTotalQty = $oldBarangs->sum('qty');
        $penempatanIds = $request->penempatan_id;
        $qtyPenempatans = $request->qty_penempatan;
        // Validasi penempatan tidak boleh ganda
        if (count($penempatanIds) !== count(array_unique($penempatanIds))) {
            return back()->withInput()->withErrors(['penempatan_id' => 'Penempatan tidak boleh ganda!']);
        }
        // Hapus semua barangs lama untuk sp_id dan nama_barang tsb
        Barang::where('sp_id', $sp_id)->where('nama_barang', $nama_barang)->delete();
        $harga = $request->harga ?? 0;
        $ongkos_kirim = $request->ongkos_kirim ?? 0;
        foreach ($penempatanIds as $pIndex => $penempatanId) {
            $qty = $qtyPenempatans[$pIndex] ?? 0;
            $total = $qty * $harga;
            Barang::create([
                'sp_id'         => $sp->id,
                'nama_barang'   => $request->nama_barang,
                'qty'           => $qty,
                'harga'         => $harga,
                'total'         => $total,
                'ongkos_kirim'  => $ongkos_kirim,
                'penempatan_id' => $penempatanId,
            ]);
        }
        $sp->updateTotalKontrak();
        return redirect()->route('sp.show', $sp_id)->with('success', 'Barang berhasil diperbarui.');
    }
}
