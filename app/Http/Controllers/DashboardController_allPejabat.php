<?php

namespace App\Http\Controllers;

use App\Models\Sp;
use App\Models\PaketPekerjaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Total Pagu dan Kontrak
        $totalPagu = PaketPekerjaan::sum('pagu');
        $totalKontrak = Sp::sum('total_kontrak');
        $sisaPagu = $totalPagu - $totalKontrak;
        $persentasePenggunaan = $totalPagu > 0 ? ($totalKontrak / $totalPagu) * 100 : 0;

        // Statistik Kontrak
        $kontrakAktif = Sp::where('akhir_pekerjaan', '>=', now())->count();
        $kontrakSelesai = Sp::where('akhir_pekerjaan', '<', now())->count();
        $rataRataKontrak = Sp::count() > 0 ? $totalKontrak / Sp::count() : 0;

        // Kontrak yang akan jatuh tempo (7 hari ke depan)
        $tanggalJatuhTempo = Carbon::now()->addDays(20);
        $kontrakJatuhTempo = Sp::where('akhir_pekerjaan', '>=', now())
            ->where('akhir_pekerjaan', '<=', $tanggalJatuhTempo)
            ->with('penyedia')
            ->orderBy('akhir_pekerjaan')
            ->take(5)
            ->get();

        // Data untuk grafik
        $kontrakPerBulan = Sp::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as jumlah')
            ->whereYear('tanggal', Carbon::now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->map(function ($item) {
                $item->nama_bulan = Carbon::create()->month($item->bulan)->format('F');
                return $item;
            });

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
// This controller handles the dashboard functionality of the application.  
