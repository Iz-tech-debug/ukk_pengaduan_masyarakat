<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf; // Import yang benar

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

    // Laporan Index
    public function LaporanIndex(Request $daffareq)
    {
        // Ambil semua data pengaduan secara default
        $daffaquery = Pengaduan::query();

        // Filter berdasarkan status
        if ($daffareq->filled('status')) {
            $daffaquery->where('status', $daffareq->status);
        }

        // Filter berdasarkan tanggal mulai dan selesai
        if ($daffareq->filled('daffamulai')) {
            $daffaquery->whereDate('created_at', '>=', $daffareq->daffamulai);
        }

        if ($daffareq->filled('daffaakhir')) {
            $daffaquery->whereDate('created_at', '<=', $daffareq->daffaakhir);
        }

        // Dapatkan data pengaduan berdasarkan filter
        $daffapengaduan = $daffaquery->get();

        // Kirim data ke view
        return view('Page.Laporan.index', compact('daffapengaduan'));
    }


    public function CetakLaporan(Request $request)
    {
        // Ambil data berdasarkan filter
        $query = Pengaduan::query();

        if ($request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->daffamulai && $request->daffaakhir) {
            $query->whereBetween('created_at', [$request->daffamulai, $request->daffaakhir]);
        }

        // Ambil data dan kelompokkan berdasarkan bulan
        $daffapengaduan = $query->select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan"),
            DB::raw("SUM(CASE WHEN status THEN 1 ELSE 0 END) as jumlah"),
            DB::raw("SUM(CASE WHEN status = '0' THEN 1 ELSE 0 END) as belum_selesai"),
            DB::raw("SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) as proses"),
            DB::raw("SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai")
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Format periode untuk ditampilkan
        $daffamulai = Carbon::parse($request->daffamulai)->translatedFormat('F Y');
        $daffaakhir = Carbon::parse($request->daffaakhir)->translatedFormat('F Y');
        $daffaperiode = $daffamulai . ' - ' . $daffaakhir;

        // Load view PDF dan passing data
        $pdf = PDF::loadView('Page.Laporan.cetak', [
            'daffapengaduan' => $daffapengaduan,
            'daffaperiode' => $daffaperiode // Periode dalam format yang sesuai
        ]);

        // Download file PDF
        return $pdf->download('laporan_pengaduan.pdf');
    }

    // Tampilan data untuk masyarakat
    public function DataPengaduan()
    {
        // Ambil data pengaduan berdasarkan NIK yang login
        $daffapengaduan = Pengaduan::where('nik', session('daffanik'))
            ->with('tanggapan') // Tambahkan relasi ke tanggapan
            ->get();

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

        return redirect('/data_pengaduan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $daffarequest)
    {
        // Selesaikan Pengaduan status
        $daffapengaduan = Pengaduan::where('id_pengaduan', $daffarequest->daffaid_pengaduan)->firstOrFail();
        $daffapengaduan->status = 'selesai';
        $daffapengaduan->save();

        return redirect('/pengaduan');
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
