<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilan Pengaduan
        $daffapengaduan = Pengaduan::all();

        return view('Page.Pengaduan.Pengaduan', compact('daffapengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function MasyarakatNgadu(Request $daffareq)
    {
        // Mengadu
        $daffapengaduan = new Pengaduan();

        $daffapengaduan->tgl_pengaduan = Carbon::now();
        $daffapengaduan->nik = $daffareq->daffanik;
        $daffapengaduan->isi_laporan = $daffareq->daffaktr;
        $daffapengaduan->isi_laporan = $daffareq->daffaktr;
        // cek input file gambar
        if ($daffareq->file('gambar')) {
            $file = $daffareq->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filenameToStore = $daffareq->nama_barang . '_' . time() . '.' . $extension;
            $path = $file->storeAs('gambar_barang', $filenameToStore, 'public');
            $daffapengaduan->foto = $path;
        }

        $daffapengaduan->status = '0';
        $daffapengaduan->save();
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
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
