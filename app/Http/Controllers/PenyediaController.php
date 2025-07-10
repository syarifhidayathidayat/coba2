<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use Illuminate\Http\Request;

class PenyediaController extends Controller
{
    public function index()
    {
        $penyedias = Penyedia::all();
        return view('penyedia.index', compact('penyedias'));
    }
    public function create()
    {
        return view('penyedia.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penyedia' => 'required|string|max:255',
            'nama_direktur_penyedia' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:30',
            'website' => 'required|string|max:50',
            'fax' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'rekening_bank' => 'required|string',
            'cabang_bank' => 'required|string',
            'rekening_atas_nama' => 'required|string',
            'npwp' => 'required|string',
            'dokumen_npwp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_ktp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_rekening_koran' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);
        if ($request->hasFile('dokumen_npwp')) {
            $validated['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_ktp')) {
            $validated['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_rekening_koran')) {
            $validated['dokumen_rekening_koran'] = $request->file('dokumen_rekening_koran')->store('dokumen_penyedia', 'public');
        }
        if (auth()->check() && auth()->user()->hasRole('Penyedia')) {
            $validated['user_id'] = auth()->id();
        }
        Penyedia::create($validated);
        return redirect()->route('penyedia.index')->with('success', 'Data penyedia berhasil disimpan.');
    }
    public function edit(Penyedia $penyedia)
    {
        return view('penyedia.edit', compact('penyedia'));
    }
    public function update(Request $request, Penyedia $penyedia)
    {
        $validated = $request->validate([
            'nama_penyedia' => 'required|string|max:255',
            'nama_direktur_penyedia' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:30',
            'website' => 'required|string|max:50',
            'fax' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'rekening_bank' => 'required|string',
            'cabang_bank' => 'required|string',
            'rekening_atas_nama' => 'required|string',
            'npwp' => 'required|string',
            'dokumen_npwp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_ktp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_rekening_koran' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);
        if ($request->hasFile('dokumen_npwp')) {
            $validated['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_ktp')) {
            $validated['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_rekening_koran')) {
            $validated['dokumen_rekening_koran'] = $request->file('dokumen_rekening_koran')->store('dokumen_penyedia', 'public');
        }
        $penyedia->update($validated);
        return redirect()->route('penyedia.index')->with('success', 'Data penyedia berhasil diperbarui.');
    }
    public function destroy(Penyedia $penyedia)
    {
        $penyedia->delete();
        return redirect()->route('penyedia.index')->with('success', 'Data penyedia berhasil dihapus.');
    }
    public function show(Penyedia $penyedia)
    {
        return view('penyedia.show', compact('penyedia'));
    }
    public function editProfile()
    {
        $penyedia = auth()->user()->penyedia;
        if (!$penyedia) {
            abort(404, 'Data penyedia belum tersedia.');
        }
        // Ambil daftar BAST berdasarkan relasi melalui SP
        $basts = \App\Models\Bast::whereHas('sp', function ($query) use ($penyedia) {
            $query->where('penyedia_id', $penyedia->id);
        })->with('sp')->latest()->get();
        return view('penyedia.profile', compact('penyedia', 'basts'));
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $penyedia = $user->penyedia;
        if (!$penyedia) {
            // Kalau belum ada datanya, buat dulu entry-nya
            $penyedia = new Penyedia(['user_id' => $user->id]);
        }
        $data = $request->only([
            'nama_penyedia',
            'nama_direktur_penyedia',
            'alamat',
            'telepon',
            'website',
            'fax',
            'email',
            'rekening_bank',
            'cabang_bank',
            'rekening_atas_nama',
            'npwp'
        ]);
        if ($request->hasFile('dokumen_npwp')) {
            $data['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_ktp')) {
            $data['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen_penyedia', 'public');
        }
        if ($request->hasFile('dokumen_rekening_koran')) {
            $data['dokumen_rekening_koran'] = $request->file('dokumen_rekening_koran')->store('dokumen_penyedia', 'public');
        }
        $penyedia->fill($data)->save();
        return redirect()->route('penyedia.profile')->with('success', 'Profil berhasil diperbarui');
    }
    public function bastSaya()
    {
        $penyedia = auth()->user()->penyedia;

        $basts = \App\Models\Bast::whereHas('sp', function ($query) use ($penyedia) {
            $query->where('penyedia_id', $penyedia->id);
        })->with('sp')->latest()->get();

        return view('penyedia.bast.index', compact('basts'));
    }
}
