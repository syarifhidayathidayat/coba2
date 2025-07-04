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
                'no_telp' => '0511-4773267',
                'fax' => '0216544811',
                'kode_institusi' => '1233',
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
                'dipa' => 'DIPA-024.12.2.632310/2025',
                'tanggal_sp_dipa' => '2025-01-01',
                'sp_dipa' => 'sp_dipa_files/fEHrtxbSA4k3MD3uoh3T2q6idgvu2x6boxjMjIDS.pdf',
                'no_sk_pejabat' => 'HK.02.03/2.5/7480/2021',
                'tanggal_sk_pejabat' => '2025-01-01',
                'upload_sk_pejabat' => 'sk_pejabat_files/RIfEDWF04b2JdZOSecICS29XnlZwJcbg0l62N9ni.pdf',
                'created_at' => '2025-07-04 04:25:45',
                'updated_at' => '2025-07-04 04:37:46',
                'tanggal_mulai' => '2024-11-01',
                'tanggal_selesai' => '2027-12-31',
            ]
            // [
            //     'nama_institusi' => 'Poltekkes Kemenkes Banjarmasin',
            //     'alamat' => 'Jl. Mistar Cokrokusumo No. 1, Banjarbaru',
            //     'no_telp' => '0511-4773267',
            //     'fax' => '0216544811',
            //     'kode_institusi' => '1233',
            //     'nama_ppk_52' => 'Dr. Suroto, S.KM., M.Kes',
            //     'nip_ppk_52' => '196408231989031003',
            //     'nama_ppk_53' => 'Tut Barkinah, S.Si.T., M.Pd',
            //     'nip_ppk_53' => '196010101982082001',
            //     'nama_pejabat_pengadaan_52' => 'Muhammad Yusril Pratama, S.Tr.Kes',
            //     'nip_pejabat_pengadaan_52' => '199806032022031002',
            //     'nama_pejabat_pengadaan_53' => 'Muhammad Fadhil Rahman, S.Tr.Gz',
            //     'nip_pejabat_pengadaan_53' => '199407082022031002',
            //     'nama_bendahara' => 'Linda Pujiastuti, SKM',
            //     'nip_bendahara' => '198109162002122001',
            //     'dipa' => 'DIPA-024.12.2.632310/2025',
            //     'tanggal_sp_dipa' => '2025-01-01',
            //     'sp_dipa' => 'sp_dipa_files/fEHrtxbSA4k3MD3uoh3T2q6idgvu2x6boxjMjIDS.pdf',
            //     'no_sk_pejabat' => 'HK.02.03/2.5/7480/2021',
            //     'tanggal_sk_pejabat' => '2025-01-01',
            //     'upload_sk_pejabat' => 'sk_pejabat_files/RIfEDWF04b2JdZOSecICS29XnlZwJcbg0l62N9ni.pdf',
            //     'created_at' => '2025-07-04 04:25:45',
            //     'updated_at' => '2025-07-04 04:37:46',
            //     'tanggal_mulai' => '2024-11-01',
            //     'tanggal_selesai' => '2027-12-31',
            // ]
        ];
        foreach ($data as $item) {
            Institusi::create($item);
        }
    }
}
