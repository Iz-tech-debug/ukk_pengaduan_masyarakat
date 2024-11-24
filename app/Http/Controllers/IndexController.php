<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

class IndexController extends Controller
{
    // Tampilan Utama Admin
    public function AdminIndex()
    {
        $daffatotalPetugas = Petugas::count();
        $daffatotalPengaduan = Pengaduan::count();
        $daffapengaduanDiproses = Pengaduan::where('status', 'proses')->count();
        $daffatotalMasyarakat = Masyarakat::count();
        $daffapersentaseDiproses = $daffatotalPengaduan > 0 ? ($daffapengaduanDiproses / $daffatotalPengaduan) * 100 : 0;

        $daffapengaduanTerbaru = Pengaduan::orderBy('created_at', 'desc')->take(10)->get();

        return view('Pengguna.Admin.index', compact(
            'daffatotalPetugas',
            'daffatotalPengaduan',
            'daffapengaduanDiproses',
            'daffapersentaseDiproses',
            'daffatotalMasyarakat',
            'daffapengaduanTerbaru'
        ));
    }


    // Tampilan Utama Petugas
    public function PetugasIndex()
    {

    }


    // Tampilan Utama Masyarakat
    public function MasyarakatIndex()
    {
        
    }
}
