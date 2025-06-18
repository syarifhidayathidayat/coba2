<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bast;
use App\Models\Sp;
use App\Models\Pegawai;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $basts = Bast::where('nomor_bast', 'like', "%$q%")
            ->orWhere('nomor_bap', 'like', "%$q%")
            ->orWhere('nomor_bapem', 'like', "%$q%")
            ->get();
        $sps = Sp::where('nomor_sp', 'like', "%$q%")
            ->orWhere('nama_paket', 'like', "%$q%")
            ->get();
        $pegawais = Pegawai::where('nama', 'like', "%$q%")
            ->orWhere('nip', 'like', "%$q%")
            ->get();
        return view('search.index', compact('q', 'basts', 'sps', 'pegawais'));
    }
}
