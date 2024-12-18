<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilan Masyarakat
        $daffamasyarakat = Masyarakat::all();
        return view('Page.Masyarakat.index', compact('daffamasyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function Registrasi(Request $request)
    {
        $request->validate([
            'daffanik' => 'required|unique:masyarakat,nik',
            'daffanama' => 'required|string',
            'daffatelpon' => 'required|numeric',
            'daffausername' => 'required|unique:masyarakat,username|unique:petugas,username',
            'daffapassword' => 'required|string',
        ], [
            'daffanik.required' => 'NIK harus diisi',
            'daffanik.unique' => 'NIK sudah terdaftar',
            'daffanama.required' => 'Nama harus diisi',
            'daffatelpon.required' => 'Nomor Telepon harus diisi',
            'daffatelpon.numeric' => 'Nomor Telepon harus berupa angka',
            'daffausername.required' => 'Username harus diisi',
            'daffausername.unique' => 'Username sudah terdaftar',
            'daffapassword.required' => 'Password harus diisi',
        ]);

        $daffamasyarakat = new Masyarakat;

        $daffamasyarakat->nik = $request->daffanik;
        $daffamasyarakat->nama = $request->daffanama;
        $daffamasyarakat->username = $request->daffausername;
        $daffamasyarakat->password = Hash::make($request->daffapassword);
        $daffamasyarakat->telp = $request->daffatelpon;

        $daffamasyarakat->save();

        return redirect('/halaman_utama');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'daffanik' => 'required|unique:masyarakat,nik',
            'daffanama' => 'required|string',
            'daffatelp' => 'required|numeric',
            'daffauser' => 'required|unique:masyarakat,username|unique:petugas,username',
            'daffapassword' => 'required|string',
        ], [
            'daffanik.required' => 'NIK harus diisi',
            'daffanik.unique' => 'NIK sudah terdaftar',
            'daffanama.required' => 'Nama harus diisi',
            'daffatelp.required' => 'Nomor Telepon harus diisi',
            'daffatelp.numeric' => 'Nomor Telepon harus berupa angka',
            'daffauser.required' => 'Username harus diisi',
            'daffauser.unique' => 'Username sudah terdaftar',
            'daffapassword.required' => 'Password harus diisi',
        ]);

        $daffamasyarakat = new Masyarakat;

        $daffamasyarakat->nik = $request->daffanik;
        $daffamasyarakat->nama = $request->daffanama;
        $daffamasyarakat->username = $request->daffauser;
        $daffamasyarakat->password = Hash::make($request->daffapassword);
        $daffamasyarakat->telp = $request->daffatelp;

        // dd($daffamasyarakat);
        $daffamasyarakat->save();

        return redirect('/masyarakat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Masyarakat $masyarakat)
    {
        //
    }

    public function update(Request $daffareq, $nik)
    {
        // Ambil data masyarakat berdasarkan NIK lama
        $daffamasyarakat = Masyarakat::findOrFail($nik);

        // Ubah validasi untuk mengabaikan NIK saat update
        $daffareq->validate([
            'daffanik' => [
                'required',
                'numeric',
                Rule::unique('masyarakat', 'nik')->ignore($daffamasyarakat->nik, 'nik'), // Abaikan nik saat update
            ],
            'daffanama' => 'required|string',
            'daffauser' => [
                'required',
                Rule::unique('masyarakat', 'username')->ignore($daffamasyarakat->nik, 'nik'),
                Rule::unique('petugas', 'username'),
            ],
            'daffatelp' => 'required|numeric',
        ], [
            'daffanik.required' => 'NIK harus diisi',
            'daffanik.numeric' => 'NIK harus berupa angka',
            'daffanik.unique' => 'NIK sudah digunakan pengguna lain',
            'daffanama.required' => 'Nama harus diisi',
            'daffatelp.required' => 'Nomor Telepon harus diisi',
            'daffatelp.numeric' => 'Nomor Telepon harus berupa angka',
            'daffauser.required' => 'Username harus diisi',
            'daffauser.unique' => 'Username sudah terdaftar',
        ]);

        // Update data masyarakat
        $daffamasyarakat->nama = $daffareq->daffanama;
        $daffamasyarakat->username = $daffareq->daffauser;
        $daffamasyarakat->telp = $daffareq->daffatelp;

        // Update NIK hanya jika berbeda dengan yang lama
        if ($daffareq->daffanik != $daffamasyarakat->nik) {
            $daffamasyarakat->nik = $daffareq->daffanik;
        }

        // Update password jika diisi
        if (!empty($daffareq->daffapassword)) {
            $daffamasyarakat->password = Hash::make($daffareq->daffapassword);
        }

        // Simpan perubahan
        $daffamasyarakat->save();

        return redirect()->back()->with('success', 'Akun berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masyarakat $masyarakat, $id)
    {
        try {
            $daffamasyarakat = Masyarakat::findOrFail($id);
            $daffamasyarakat->delete();

            return redirect()->back()->with('success', 'Akun berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Akun tidak dapat dihapus karena mempunyai data pengaduan');
        }
    }
}
