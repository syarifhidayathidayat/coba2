<?php
namespace App\Http\Controllers;
use App\Models\DokumenPemilihan;
use Illuminate\Http\Request;
use App\Models\Institusi;
use App\Models\PaketPekerjaan;
use PDF;
$bulanRomawi = bulanRomawi(date('n'));
class DokumenPemilihanController extends Controller
{
    public function index()
    {
        $dokumens = DokumenPemilihan::latest()->get();
        return view('dokumen_pemilihan.index', compact('dokumens'));
    }
    public function create()
    {
        $bulan = date('n');
        $tahun = date('Y');
        $bulanRomawi = bulanRomawi($bulan);
        // Hitung jumlah dokumen pada bulan ini
        $jumlahDokumenBulanIni = DokumenPemilihan::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->count();
        // Buat nomor urut, mulai dari 10 dan kelipatan 10
        $nomorUrut = ($jumlahDokumenBulanIni + 1) * 5;
        $nomorOtomatis = "ULP/Pejabat Pengadaan/{$bulanRomawi}/{$nomorUrut}/{$tahun}";
        return view('dokumen_pemilihan.create', compact('nomorOtomatis'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'undangan_nomor' => 'required|string|max:255',
            'undangan_tanggal' => 'required|date',
            'hps' => 'required|numeric',
            'undangan_pemasukan_tgl_mulai' => 'nullable|date',
            'undangan_pemasukan_tgl_selesai' => 'nullable|date',
            'undangan_pemasukan_jam' => 'nullable',
            'undangan_evaluasi_tgl_mulai' => 'nullable|date',
            'undangan_evaluasi_tgl_selesai' => 'nullable|date',
            'undangan_evaluasi_jam' => 'nullable',
            'undangan_spk_hari' => 'nullable|string',
            'undangan_spk_tanggal' => 'nullable|date',
            'uraian_paket' => 'required',
            'no_surat_izin_usaha' => 'nullable|string',
            'masa_berlaku_penawaran' => 'nullable|string',
            'bidang_usaha' => 'nullable|string',
            'jangka_waktu_penyerahan' => 'nullable|string',
            'ba_pembukaan_nomor' => 'nullable|string',
            'ba_pembukaan_hari' => 'nullable|string',
            'ba_pembukaan_tanggal' => 'nullable|date',
            'ba_pembukaan_surat_penawaran' => 'nullable|boolean',
            'ba_pembukaan_dok_teknis' => 'nullable|boolean',
            'ba_pembukaan_syarat' => 'nullable|boolean',
            'ba_pembukaan_lain' => 'nullable|boolean',
            'ba_pembukaan_keterangan' => 'nullable|string',
            'ba_klarifikasi_nomor' => 'nullable|string',
            'ba_klarifikasi_hari' => 'nullable|string',
            'ba_klarifikasi_tanggal' => 'nullable|date',
            'ba_klarifikasi_harga_penawaran' => 'nullable|numeric',
            'ba_klarifikasi_harga_negosiasi' => 'nullable|numeric',
            'ba_hasil_nomor' => 'nullable|string',
            'ba_hasil_hari' => 'nullable|string',
            'ba_hasil_tanggal' => 'nullable|date',
            'ba_hasil_penawaran_admin' => 'nullable|boolean',
            'ba_hasil_penawaran_teknis' => 'nullable|boolean',
            'ba_hasil_penawaran_biaya' => 'nullable|boolean',
            'ba_hasil_penawaran_keterangan' => 'nullable|string',
            'ba_hasil_harga_koreksi' => 'nullable|numeric',
            'ba_hasil_harga_final' => 'nullable|numeric',
            'ba_hasil_evaluasi_admin' => 'nullable|string',
            'ba_hasil_evaluasi_teknis' => 'nullable|string',
            'ba_hasil_evaluasi_harga' => 'nullable|string',
            'nota_dinas_nomor' => 'nullable|string',
            'nota_dinas_tanggal' => 'nullable|date',
        ]);
        $dokumen = DokumenPemilihan::create($validated);
        return redirect()->route('sp.create')
        // return redirect()->route('dokumen-pemilihan.index')
            ->with('success', 'Dokumen Pemilihan berhasil disimpan, Lanjutkan untuk membuat Kontrak');
    }
    public function edit($id)
    {
        $dokumen = \App\Models\DokumenPemilihan::findOrFail($id);
        return view('dokumen_pemilihan.edit', compact('dokumen'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            //  Sama seperti validasi di store
            'undangan_nomor' => 'required|string|max:255',
            'undangan_tanggal' => 'required|date',
            'hps' => 'required|numeric',
            'undangan_pemasukan_tgl_mulai' => 'nullable|date',
            'undangan_pemasukan_tgl_selesai' => 'nullable|date',
            'undangan_pemasukan_jam' => 'nullable',
            'undangan_evaluasi_tgl_mulai' => 'nullable|date',
            'undangan_evaluasi_tgl_selesai' => 'nullable|date',
            'undangan_evaluasi_jam' => 'nullable',
            'undangan_spk_hari' => 'nullable|string',
            'undangan_spk_tanggal' => 'nullable|date',
            'uraian_paket' => 'required|string',
            'no_surat_izin_usaha' => 'nullable|string',
            'masa_berlaku_penawaran' => 'nullable|string',
            'bidang_usaha' => 'nullable|string',
            'jangka_waktu_penyerahan' => 'nullable|string',
            'ba_pembukaan_nomor' => 'nullable|string',
            'ba_pembukaan_hari' => 'nullable|string',
            'ba_pembukaan_tanggal' => 'nullable|date',
            'ba_pembukaan_surat_penawaran' => 'nullable|boolean',
            'ba_pembukaan_dok_teknis' => 'nullable|boolean',
            'ba_pembukaan_syarat' => 'nullable|boolean',
            'ba_pembukaan_lain' => 'nullable|boolean',
            'ba_pembukaan_keterangan' => 'nullable|string',
            'ba_klarifikasi_nomor' => 'nullable|string',
            'ba_klarifikasi_hari' => 'nullable|string',
            'ba_klarifikasi_tanggal' => 'nullable|date',
            'ba_klarifikasi_harga_penawaran' => 'nullable|numeric',
            'ba_klarifikasi_harga_negosiasi' => 'nullable|numeric',
            'ba_hasil_nomor' => 'nullable|string',
            'ba_hasil_hari' => 'nullable|string',
            'ba_hasil_tanggal' => 'nullable|date',
            'ba_hasil_penawaran_admin' => 'nullable|boolean',
            'ba_hasil_penawaran_teknis' => 'nullable|boolean',
            'ba_hasil_penawaran_biaya' => 'nullable|boolean',
            'ba_hasil_penawaran_keterangan' => 'nullable|string',
            'ba_hasil_harga_koreksi' => 'nullable|numeric',
            'ba_hasil_harga_final' => 'nullable|numeric',
            'ba_hasil_evaluasi_admin' => 'nullable|string',
            'ba_hasil_evaluasi_teknis' => 'nullable|string',
            'ba_hasil_evaluasi_harga' => 'nullable|string',
            'nota_dinas_nomor' => 'nullable|string',
            'nota_dinas_tanggal' => 'nullable|date',
        ]);
        $dokumen = \App\Models\DokumenPemilihan::findOrFail($id);
        $dokumen->update($validated);
        return redirect()->route('dokumen-pemilihan.index')
            ->with('success', 'Dokumen Pemilihan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $dokumen = \App\Models\DokumenPemilihan::findOrFail($id);
        $dokumen->delete();
        return redirect()->route('dokumen-pemilihan.index')->with('success', 'Dokumen berhasil dihapus.');
    }
    // public function cetakUndangan($id)
    // {
    //     $dokumen = DokumenPemilihan::findOrFail($id);
    //     return view('dokumen_pemilihan.cetak.undangan', compact('dokumen'));
    // }
    public function cetakUndangan($id)
    {
        $dokumen = DokumenPemilihan::with('sp.penyedia')->findOrFail($id);
        $tanggal = $dokumen->undangan_tanggal;
        $institusi = \App\Models\Institusi::where('tanggal_mulai', '<=', $tanggal)
            ->where('tanggal_selesai', '>=', $tanggal)
            ->first();
        $paket_pekerjaan = PaketPekerjaan::where('nama_paket', $dokumen->uraian_paket)->first();
        $pdf = Pdf::loadView('dokumen_pemilihan.cetak.undangan', compact('dokumen', 'institusi', 'paket_pekerjaan'))
            ->setPaper('a4', 'portrait');
        return $pdf->stream('DokumenPemilihan_Pengadaan_Langsung.pdf');
    }
}
