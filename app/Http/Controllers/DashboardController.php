<?php

namespace App\Http\Controllers;

use App\Models\Sp;
use App\Models\PaketPekerjaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tahun = session('tahun', now()->year); // Gunakan tahun dari session, default tahun sekarang
        $jenisAkun = null;

        // Tentukan jenis akun berdasarkan role
        if ($user->hasRole('Pejabat-Pengadaan52')) {
            $jenisAkun = '52';
        } elseif ($user->hasRole('Pejabat-Pengadaan53')) {
            $jenisAkun = '53';
        }

        // Siapkan query dasar
        $paketQuery = PaketPekerjaan::query();
        $spQuery = Sp::query();

        // Filter berdasarkan jenis akun dan tahun
        if ($jenisAkun) {
            $paketQuery->where('jenis_akun', $jenisAkun);
            $spQuery->where('jenis_akun', $jenisAkun);
        }

        $paketQuery->where('tahun_anggaran', $tahun);
        $spQuery->whereYear('tanggal', $tahun);

        // Hitungan umum
        $totalPagu = $paketQuery->sum('pagu');
        $totalKontrak = $spQuery->sum('total_kontrak');
        $sisaPagu = $totalPagu - $totalKontrak;
        $persentasePenggunaan = $totalPagu > 0 ? ($totalKontrak / $totalPagu) * 100 : 0;

        // Statistik kontrak
        $kontrakAktif = $spQuery->clone()->where('akhir_pekerjaan', '>=', now())->count();
        $kontrakSelesai = $spQuery->clone()->where('akhir_pekerjaan', '<', now())->count();
        $rataRataKontrak = $spQuery->count() > 0 ? $totalKontrak / $spQuery->count() : 0;

        // Jatuh tempo (20 hari ke depan)
        $tanggalJatuhTempo = Carbon::now()->addDays(20);
        $kontrakJatuhTempo = $spQuery->clone()
            ->where('akhir_pekerjaan', '>=', now())
            ->where('akhir_pekerjaan', '<=', $tanggalJatuhTempo)
            ->with('penyedia')
            ->orderBy('akhir_pekerjaan')
            ->take(5)
            ->get();

        // Grafik kontrak per bulan (bar chart)
        $kontrakPerBulan = $spQuery->clone()
            ->selectRaw('MONTH(tanggal) as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->map(function ($item) {
                $item->nama_bulan = Carbon::create()->month($item->bulan)->format('F');
                return $item;
            });

        // Grafik status kontrak (donut/pie chart)
        $statusKontrak = [
            'Aktif' => $kontrakAktif,
            'Selesai' => $kontrakSelesai
        ];

        return view('dashboard.index', compact(
            'totalPagu',
            'totalKontrak',
            'sisaPagu',
            'persentasePenggunaan',
            'kontrakAktif',
            'kontrakSelesai',
            'rataRataKontrak',
            'kontrakJatuhTempo',
            'kontrakPerBulan',
            'statusKontrak'
        ));
    }
}
