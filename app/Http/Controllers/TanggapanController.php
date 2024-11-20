<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $daffareq)
    {
        // Validasi input
        $daffareq->validate([
            'daffaid_pengaduan' => 'required|exists:pengaduan,id_pengaduan',
            'daffatanggapan' => 'required|string',
            'daffaid_petugas' => 'required|exists:petugas,id_petugas',
        ]);

        // Memasukkan data ke dalam tabel Tanggapan
        $daffatanggapan = new Tanggapan();
        $daffatanggapan->id_pengaduan = $daffareq->daffaid_pengaduan;
        $daffatanggapan->tgl_tanggapan = Carbon::now();
        $daffatanggapan->tanggapan = $daffareq->daffatanggapan;
        $daffatanggapan->id_petugas = $daffareq->daffaid_petugas;

        $daffatanggapan->save();

        // Mengubah status pengaduan menjadi "proses"
        $daffapengaduan = Pengaduan::where('id_pengaduan', $daffareq->daffaid_pengaduan)->first();
        if ($daffapengaduan) {
            $daffapengaduan->status = 'proses'; // Ubah status menjadi 'proses'
            $daffapengaduan->save();
        }

        return redirect('/pengaduan')->with('success', 'Tanggapan berhasil disimpan dan status pengaduan diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanggapan $tanggapan)
    {
        // 
    }
}
