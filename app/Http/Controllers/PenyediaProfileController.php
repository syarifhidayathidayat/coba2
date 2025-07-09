<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyediaProfileController extends Controller
{
    public function edit()
    {
        $penyedia = Auth::user()->penyedia;

        if (!$penyedia) {
            abort(403, 'Data penyedia tidak ditemukan.');
        }

        return view('penyedia.profile', compact('penyedia'));
    }

    public function update(Request $request)
    {
        $penyedia = Auth::user()->penyedia;

        if (!$penyedia) {
            abort(403, 'Data penyedia tidak ditemukan.');
        }

        $validated = $request->validate([
            'nama_penyedia' => 'required|string|max:255',
            'nama_direktur_penyedia' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            // Tambahkan validasi lainnya sesuai kebutuhanmu
        ]);

        $penyedia->update($validated);

        return redirect()->route('penyedia.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
