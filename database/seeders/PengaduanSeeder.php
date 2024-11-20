<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Dummy untuk pengaduan
        $daffapengaduan = [
            [
                'tgl_pengaduan' => Date::now(),
                'nik' => '1234567890',
                'isi_laporan' => 'Bau sampah di.....',
                'foto' => 'gambar_pengaduan/1.jpg',
                'status' => '0',
            ],
        ];

        foreach ($daffapengaduan as $daffarray) {
            Pengaduan::create([
                'tgl_pengaduan' => $daffarray['tgl_pengaduan'],
                'nik' => $daffarray['nik'],
                'isi_laporan' => $daffarray['isi_laporan'],
                'foto' => $daffarray['foto'],
                'status' => $daffarray['status'],
            ]);
        }
    }
}
