<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penempatan; // <== PENTING

class PenempatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'DIR'],
            ['nama' => 'KLG'],
            ['nama' => 'KEP'],
            ['nama' => 'BID'],
            ['nama' => 'GIZ'],
            ['nama' => 'TLM'],
            ['nama' => 'KGI'],
        ];

        foreach ($data as $item) {
            Penempatan::create($item);
        }
    }
}
