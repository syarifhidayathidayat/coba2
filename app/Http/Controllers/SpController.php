<?php

namespace App\Http\Controllers;

use App\Models\Sp;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SpController extends Controller
{
    public function index()
    {
        $sp = Sp::with(['penyedia', 'barangs'])->get(); // atau paginate jika ingin pagination

        return view('sp.index', compact('sp'));
    }

    public function create()
    {
        $penyedias = Penyedia::all();
        $metodes = ['Tender', 'Penunjukan Langsung', 'Pengadaan Langsung', 'E-Purchasing', 'Swakelola'];
        return view('sp.create', compact('penyedias', 'metodes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_sp' => 'required|string',
            'penyedia_id' => 'required|exists:penyedias,id',
            'nama_paket' => 'required|string',
            'tanggal' => 'required|date',
            'total_kontrak' => 'required|numeric',
            'mulai_pekerjaan' => 'required|date',
            'masa' => 'required|integer|min:1',
            'metode' => 'required|string',
            'total_pagu' => 'required|numeric',
            'akun' => 'required|string',
        ]);

        $validated['akhir_pekerjaan'] = Carbon::parse($validated['mulai_pekerjaan'])->addDays((int) $validated['masa']);

        Sp::create($validated);

        return redirect()->route('sp.index')->with('success', 'Data SP berhasil disimpan.');
    }
}
