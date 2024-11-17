<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daffapetugas = Petugas::all();
        return view('Page.Petugas.index', compact('daffapetugas'));
    }

    public function petugas()
    {
        $daffapetugas = Petugas::where('level', 'petugas')->get();
        return view('Page.Petugas.index', compact('daffapetugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Memasukkan data kedalam Tabel Petugas
        $request->validate([
            'daffanama' => 'required|string',
            'daffauser' => 'required|unique:masyarakat,username|unique:petugas,username',
            'daffapassword' => 'required|string',
            'daffatelp' => 'required|numeric',
            'daffalevel' => 'required|string',
        ], [
            'daffanama.required' => 'Nama harus diisi',
            'daffatelp.required' => 'Nomor Telepon harus diisi',
            'daffatelp.numeric' => 'Nomor Telepon harus berupa angka',
            'daffauser.required' => 'Username harus diisi',
            'daffauser.unique' => 'Username sudah terdaftar',
            'daffapassword.required' => 'Password harus diisi',
            'daffalevel.required' => 'Hak akses harus dipilih',
        ]);

        $daffapetugas = new Petugas;

        $daffapetugas->nama_petugas = $request->daffanama;
        $daffapetugas->username = $request->daffauser;
        $daffapetugas->password = Hash::make($request->daffapassword);
        $daffapetugas->telp = $request->daffatelp;
        $daffapetugas->level = $request->daffalevel;

        // dd($daffapetugas);

        $daffapetugas->save();

        return redirect('/petugas');

    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_petugas)
    {
        // Ubah data petugas
        $request->validate([
            'daffanama' => 'required|string',
            'daffauser' => 'required|unique:masyarakat,username|unique:petugas,username',
            'daffapassword' => 'required|string',
            'daffatelp' => 'required|numeric',
            'daffalevel' => 'required|string',
        ], [
            'daffanama.required' => 'Nama harus diisi',
            'daffatelp.required' => 'Nomor Telepon harus diisi',
            'daffatelp.numeric' => 'Nomor Telepon harus berupa angka',
            'daffauser.required' => 'Username harus diisi',
            'daffauser.unique' => 'Username sudah terdaftar',
            'daffapassword.required' => 'Password harus diisi',
            'daffalevel.required' => 'Hak akses harus dipilih',
        ]);

        $daffapetugas = Petugas::where('username', $request->daffauser)
            ->where('id_petugas', '!=', $id_petugas)
            ->first();

        $daffapetugas->nama_petugas = $request->daffanama;
        $daffapetugas->username = $request->daffauser;
        $daffapetugas->password = Hash::make($request->daffapassword);
        $daffapetugas->telp = $request->daffatelp;
        $daffapetugas->level = $request->daffalevel;

        // dd($daffapetugas);

        $daffapetugas->save();

        return redirect('/petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_petugas)
    {
        // Hapus Petugas
        $daffapetugas = Petugas::findOrFail($id_petugas);

        // dd($daffapetugas);
        $daffapetugas->delete();
        return redirect("/petugas");
    }
}
