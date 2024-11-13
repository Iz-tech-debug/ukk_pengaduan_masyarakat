<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan data kedalam database

        $daffamasyarakat = [
            [
                'nik' => '1234567890',
                'nama' => 'Daffa Faiz Alghozi',
                'username' => 'Daoa',
                'password' => '12345678',
                'telp' => '081223025896',
            ],
            [
                'nik' => '56789276560',
                'nama' => 'Fufufafa',
                'username' => 'Fufu',
                'password' => 'fufu123',
                'telp' => '089123467891',
            ],
        ];

        foreach ($daffamasyarakat as $masyarakat) {
            Masyarakat::create([
                'nik' => $masyarakat['nik'],
                'nama' => $masyarakat['nama'],
                'username' => $masyarakat['username'],
                'password' => $masyarakat['password'],
                'telp' => $masyarakat['telp'],
            ]);
        }
    }
}
