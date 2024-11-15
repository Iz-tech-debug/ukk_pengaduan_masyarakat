<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Memasukkan data kedalam tabel Masyarakat

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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masyarakat $masyarakat)
    {
        //
    }
}
