<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Memasukkan data kedalam Petugas

        $daffapetugas = [
            [
                'nama_petugas' => 'Admin',
                'username' => 'admin',
                'password' => 'admin123',
                'telp' => '08965567897',
                'level' => 'admin',
            ],
            [
                'nama_petugas' => 'Petugas',
                'username' => 'petugas',
                'password' => 'petugas123',
                'telp' => '08965567898',
                'level' => 'petugas',
            ]
        ];

        foreach ($daffapetugas as $petugas) {
            Petugas::create([
                'nama_petugas' => $petugas['nama_petugas'],
                'username' => $petugas['username'],
                'password' => $petugas['password'],
                'telp' => $petugas['telp'],
                'level' => $petugas['level'],
            ]);
        }
    }
}
