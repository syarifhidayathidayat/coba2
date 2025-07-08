<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bast;
use App\Models\Sp;
use App\Models\Pegawai;
use App\Models\Penyedia;
use App\Models\Barang;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $basts = Bast::with('sp.penyedia')
            ->where('nomor_bast', 'like', "%$q%")
            ->orWhere('nomor_bap', 'like', "%$q%")
            ->orWhere('nomor_bapem', 'like', "%$q%")
            ->get();
        $sps = Sp::with('penyedia')
            ->where('nomor_sp', 'like', "%$q%")
            ->orWhere('nama_paket', 'like', "%$q%")
            ->orWhereHas('penyedia', function ($query) use ($q) {
                $query->where('nama_penyedia', 'like', "%$q%");
            })
            ->get();
        $pegawais = Pegawai::where('name', 'like', "%$q%")
            ->orWhere('nip', 'like', "%$q%")
            ->get();
        $penyedias = Penyedia::where('nama_penyedia', 'like', "%$q%")
            ->orWhere('rekening_bank', 'like', "%$q%")
            ->orWhere('npwp', 'like', "%$q%")
            ->get();
        $barangs = Barang::with(['sp.penyedia', 'penempatan'])
            ->where('nama_barang', 'like', "%$q%")
            ->orWhereHas('sp', function ($query) use ($q) {
                $query->where('nomor_sp', 'like', "%$q%")
                    ->orWhere('nama_paket', 'like', "%$q%");
            })
            ->get();
        return view('search.index', compact('q', 'basts', 'sps', 'pegawais', 'penyedias', 'barangs'));
    }
}
