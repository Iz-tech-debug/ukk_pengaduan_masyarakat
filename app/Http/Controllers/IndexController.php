<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AdminIndex()
    {
        $daffatotalPetugas = Petugas::count();
        $daffatotalPengaduan = Pengaduan::count();
        $daffapengaduanDiproses = Pengaduan::where('status', 'diproses')->count();
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


    /**
     * Show the form for creating a new resource.
     */
    public function PetugasIndex()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
