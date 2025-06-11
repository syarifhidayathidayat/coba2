<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Sp;
use Illuminate\Http\Request;
use App\Models\Penempatan;


class BarangController extends Controller
{
    public function create($sp_id)
    {
        $sp = Sp::findOrFail($sp_id);
        $penempatans = Penempatan::all(); // kalau form butuh pilih penempatan

        return view('barang.create', compact('sp', 'penempatans'));
    }



    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_barang.*'   => 'required|string',
            'qty.*'           => 'required|integer|min:1',
            'penempatan_id.*' => 'required|exists:penempatans,id',
        ]);

        $sp = Sp::findOrFail($id);

        foreach ($request->nama_barang as $index => $nama) {
            Barang::create([
                'sp_id'         => $sp->id,
                'nama_barang'   => $nama,
                'qty'           => $request->qty[$index],
                'penempatan_id' => $request->penempatan_id[$index],
            ]);
        }

        return redirect()->route('sp.index')->with('success', 'Data barang berhasil disimpan.');
    }


    public function indexSemuaBarang()
    {
        $barangs = Barang::with('sp')->get(); // pastikan relasi `sp` ada di model Barang
        return view('barang.semua', compact('barangs'));
    }
}
