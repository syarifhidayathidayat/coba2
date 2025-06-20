<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institusi; // PENTING: Pastikan model Institusi sudah dibuat

class InstitusiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $data = [
        [
            'nama_institusi' => 'Poltekkes Kemenkes Banjarmasin',
            'alamat' => 'Jl. Mistar Cokrokusumo No. 1, Banjarmasin',
            'nama_ppk_52' => 'Dr. Suroto, S.KM., M.Kes',
            'nip_ppk_52' => '196408231989031003',
            'nama_ppk_53' => 'Descyana Hakim, STE',
            'nip_ppk_53' => '199505022019022001',
            'nama_pejabat_pengadaan_52' => 'Muhammad Yusril Pratama, S.Tr.Kes',
            'nip_pejabat_pengadaan_52' => '199806032022031002',
            'nama_pejabat_pengadaan_53' => 'Muhammad Fadhil Rahman, S.Tr.Gz',
            'nip_pejabat_pengadaan_53' => '199407082022031002',
            'nama_bendahara' => 'Linda Pujiastuti, SKM',
            'nip_bendahara' => '198109162002122001',
            'dipa' => 'DIPA-1234567890',
            'tanggal_mulai' => '2024-01-01',
            'tanggal_selesai' => '2027-12-31'
        ]
    ];

        foreach ($data as $item) {
            Institusi::create($item);
        }
    }
}

