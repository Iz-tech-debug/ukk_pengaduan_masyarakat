<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
                'password' => Hash::make('1'),
                'telp' => '08965567897',
                'level' => 'admin',
            ],
            [
                'nama_petugas' => 'Petugas',
                'username' => 'petugas',
                'password' => Hash::make('1'),
                'telp' => '08965567898',
                'level' => 'petugas',
            ]
        ];

        foreach ($daffapetugas as $daffarray) {
            Petugas::create([
                'nama_petugas' => $daffarray['nama_petugas'],
                'username' => $daffarray['username'],
                'password' => $daffarray['password'],
                'telp' => $daffarray['telp'],
                'level' => $daffarray['level'],
            ]);
        }
    }
}
