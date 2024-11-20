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
        $daffapengaduan = Pengaduan::whereIn('status', ['0', 'proses'])->get();
        
        $daffaforeign = Pengaduan::where('masyarakat');

        return view('Page.Pengaduan.Pengaduan', compact('daffapengaduan', 'daffaforeign'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Tampilan data untuk masyarakat
    public function DataPengaduan()
    {
        // Tampilan Data Pengaduan
        $daffapengaduan = Pengaduan::where('nik', session('daffanik'))->get();

        return view('Pengguna.Masyarakat.data', compact('daffapengaduan'));
    }


    public function MasyarakatNgadu(Request $daffareq)
    {
        // Mengadu
        $daffapengaduan = new Pengaduan();

        $daffapengaduan->tgl_pengaduan = Carbon::now();
        $daffapengaduan->nik = $daffareq->daffanik;
        $daffapengaduan->isi_laporan = $daffareq->daffaktr;
        $daffapengaduan->foto = $daffareq->daffafoto;
        // cek input file gambar
        if ($daffareq->file('daffafoto')) {
            $file = $daffareq->file('daffafoto');
            $extension = $file->getClientOriginalExtension();
            $filenameToStore = $daffareq->daffanik . '_' . time() . '.' . $extension;
            $path = $file->storeAs('bukti_foto', $filenameToStore, 'public');
            $daffapengaduan->foto = $path;
        }
        // dd($daffapengaduan);
        $daffapengaduan->save();

        return redirect('/masyarakat_index');
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
    public function destroy(Pengaduan $pengaduan, $id_pengaduan)
    {
        // Hapus Pengaduan
        $daffapengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        $daffapengaduan->delete();

        return redirect('/pengaduan');
    }
}
