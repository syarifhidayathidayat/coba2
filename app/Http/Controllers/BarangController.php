<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Sp;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function create($id)
    {
        $sp = Sp::findOrFail($id);
        return view('barang.create', compact('sp'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_barang.*' => 'required|string',
            'qty.*' => 'required|integer|min:1',
        ]);

        $sp = Sp::findOrFail($id);

        foreach ($request->nama_barang as $index => $nama) {
            Barang::create([
                'sp_id' => $sp->id,
                'nama_barang' => $nama,
                'qty' => $request->qty[$index],
            ]);
        }

        return redirect()->route('sp.index')->with('success', 'Data barang berhasil disimpan.');
    }
}
