<?php
namespace App\Http\Controllers;
use App\Models\Sp;
use App\Models\Penyedia;
use App\Models\PaketPekerjaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DokumenPemilihan;
class SpController extends Controller
{
    public function index()
    {
        // Redirect ke akun yang sesuai berdasarkan role
        $user = auth()->user();
        if ($user->hasRole('Pejabat-Pengadaan52')) {
            return redirect()->route('sp.index.52');
        } elseif ($user->hasRole('Pejabat-Pengadaan53')) {
            return redirect()->route('sp.index.53');
        }
        // Default: tampilkan semua (untuk admin bro)
        $sps = Sp::with('penyedia', 'barangs')->latest()->get();
        $pageTitle = 'Semua Surat Pesanan';
        return view('sp.index', compact('sps', 'pageTitle'));
    }
    public function index52()
    {
        $tahun = session('tahun', now()->year); // Ambil tahun dari session
        if (request('belum_bast')) {
            $sps = Sp::with('penyedia', 'barangs')
                ->where('jenis_akun', '52')
                ->whereYear('tanggal', $tahun)
                ->doesntHave('bast')
                ->get();
        } else {
            $sps = Sp::with('penyedia', 'barangs')
                ->where('jenis_akun', '52')
                ->whereYear('tanggal', $tahun)
                ->get();
        }
        $pageTitle = "Surat Pesanan Akun 52 - Tahun $tahun";
        return view('sp.index', compact('sps', 'pageTitle'));
    }
    public function index53()
    {
        $tahun = session('tahun', now()->year); // Ambil tahun dari session
        if (request('belum_bast')) {
            $sps = Sp::with('penyedia', 'barangs')
                ->where('jenis_akun', '53')
                ->whereYear('tanggal', $tahun)
                ->doesntHave('bast')
                ->get();
        } else {
            $sps = Sp::with('penyedia', 'barangs')
                ->where('jenis_akun', '53')
                ->whereYear('tanggal', $tahun)
                ->get();
        }
        $pageTitle = "Surat Pesanan Akun 53 - Tahun $tahun";
        return view('sp.index', compact('sps', 'pageTitle'));
    }
    public function create()
    {
        $penyedias = Penyedia::all();
        $metodes = ['Tender', 'Penunjukan Langsung', 'Pengadaan Langsung', 'E-Purchasing', 'Swakelola'];
        $user = auth()->user();
        if ($user->hasRole('Pejabat-Pengadaan52')) {
            $paketPekerjaan = \App\Models\PaketPekerjaan::where('jenis_akun', '52')
                ->where('tahun_anggaran', date('Y'))
                ->get();
        } elseif ($user->hasRole('Pejabat-Pengadaan53')) {
            $paketPekerjaan = \App\Models\PaketPekerjaan::where('jenis_akun', '53')
                ->where('tahun_anggaran', date('Y'))
                ->get();
        } else {
            $paketPekerjaan = \App\Models\PaketPekerjaan::where('tahun_anggaran', date('Y'))->get();
        }
        $dokumenPemilihan = \App\Models\DokumenPemilihan::latest()->get();
        return view('sp.create', compact('penyedias', 'metodes', 'paketPekerjaan', 'dokumenPemilihan'));
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
            'jenis_akun' => 'required|string',
            'akhir_pekerjaan' => 'nullable|date',
            'dokumen_pemilihan_id' => 'nullable|exists:dokumen_pemilihans,id',
        ]);
        $sp = Sp::create($validated);
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
        $paketQuery = \App\Models\PaketPekerjaan::where('tahun_anggaran', date('Y'));
        if (auth()->user()->hasRole('Pejabat-Pengadaan52')) {
            $paketQuery->where('jenis_akun', '52');
        } elseif (auth()->user()->hasRole('Pejabat-Pengadaan53')) {
            $paketQuery->where('jenis_akun', '53');
        }
        $paketPekerjaan = $paketQuery->get();
        $dokumenPemilihan = DokumenPemilihan::latest()->get();
        return view('sp.edit', compact('sp', 'penyedias', 'metodes', 'paketPekerjaan', 'dokumenPemilihan'));
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
            'akun' => 'required',
            'jenis_akun' => 'required'
        ]);
        $sp = Sp::findOrFail($id);
        $sp->update($request->all());
        $sp->hitungAkhirPekerjaan();
        $redirectRoute = 'sp.index.52'; // default
        if (in_array($sp->jenis_akun, ['52', '53'])) {
            $redirectRoute = 'sp.index.' . $sp->jenis_akun;
        }
        return redirect()->route($redirectRoute)->with('success', 'Surat Pesanan berhasil diperbarui');
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
