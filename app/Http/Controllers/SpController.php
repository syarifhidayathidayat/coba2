<?php

namespace App\Http\Controllers;

use App\Models\Sp;
use App\Models\Penyedia;
use App\Models\PaketPekerjaan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SpController extends Controller
{
    public function index()
    {
        $sps = Sp::with('penyedia', 'barangs')->get(); // Ambil semua SP beserta penyedia & barangs
        return view('sp.index', compact('sps')); // Kirim ke view dengan nama variabel $sps
    }



    public function create()
    {
        $penyedias = Penyedia::all();
        $metodes = ['Tender', 'Penunjukan Langsung', 'Pengadaan Langsung', 'E-Purchasing', 'Swakelola'];
        $paketPekerjaan = PaketPekerjaan::all();
        return view('sp.create', compact('penyedias', 'metodes', 'paketPekerjaan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_sp' => 'required',
            'penyedia_id' => 'required',
            'nama_paket' => 'required',
            'tanggal' => 'required|date',
            'mulai_pekerjaan' => 'required|date',
            'masa' => 'required|integer',
            'total_pagu' => 'required|numeric',
            'metode' => 'required|string',
            'akun' => 'required|string',
            'akhir_pekerjaan' => 'nullable|date', // pastikan ini ada
        ]);

        $sp = Sp::create($validated); // hanya sekali create

        return redirect()->route('barang.create', ['id' => $sp->id])
            ->with('success', 'Data SP berhasil disimpan. Silakan masukkan detail barang.');
    }

    public function show($id)
    {
        $sp = Sp::with('barangs')->findOrFail($id);
        return view('sp.show', compact('sp'));
    }

    public function edit($id)
    {
        $sp = Sp::findOrFail($id);
        $penyedias = Penyedia::all();
        $metodes = ['Tender', 'Penunjukan Langsung', 'Pengadaan Langsung', 'E-Purchasing', 'Swakelola'];
        $paketPekerjaan = PaketPekerjaan::all();
        return view('sp.edit', compact('sp', 'penyedias', 'metodes', 'paketPekerjaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_sp' => 'required|unique:sps,nomor_sp,' . $id,
            'penyedia_id' => 'required|exists:penyedias,id',
            'nama_paket' => 'required',
            'tanggal' => 'required|date',
            'mulai_pekerjaan' => 'required|date',
            'masa' => 'required|integer',
            'akhir_pekerjaan' => 'required|date',
            'total_pagu' => 'required|numeric',
            'metode' => 'required',
            'akun' => 'required'
        ]);

        $sp = Sp::findOrFail($id);
        $sp->update($request->all());
        $sp->hitungAkhirPekerjaan();

        return redirect()->route('sp.index')->with('success', 'SP berhasil diperbarui');
    }

    public function destroy($id)
    {
        $sp = Sp::findOrFail($id);
        
        // Hapus BAST jika ada
        if ($sp->bast) {
            $sp->bast->delete();
        }
        
        // Hapus barang-barang terkait
        $sp->barangs()->delete();
        
        // Hapus SP
        $sp->delete();

        return redirect()->route('sp.index')
            ->with('success', 'Data SP berhasil dihapus.');
    }

    public function indexSemuaBarang()
    {
        $barangs = Barang::with('sp')->get(); // include data SP-nya juga
        return view('barang.semua', compact('barangs'));
    }

    public function cetak($id)
    {
        $sp = Sp::with(['penyedia', 'barangs'])->findOrFail($id);
        return view('sp.cetak', compact('sp'));
    }
}
