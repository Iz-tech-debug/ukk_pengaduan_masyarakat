<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        // Validasi data petugas
        $request->validate([
            'daffanama' => 'required|string',
            'daffauser' => [
                'required',
                Rule::unique('petugas', 'username')->ignore($id_petugas, 'id_petugas'), // Perbaikan di sini
                Rule::unique('masyarakat', 'username')
            ],
            'daffatelp' => 'required|numeric',
            'daffalevel' => 'required|string',
        ], [
            'daffanama.required' => 'Nama harus diisi',
            'daffatelp.required' => 'Nomor Telepon harus diisi',
            'daffatelp.numeric' => 'Nomor Telepon harus berupa angka',
            'daffauser.required' => 'Username harus diisi',
            'daffauser.unique' => 'Username sudah terdaftar',
            'daffalevel.required' => 'Hak akses harus dipilih',
        ]);

        // Temukan petugas berdasarkan id_petugas
        $daffapetugas = Petugas::findOrFail($id_petugas);

        // Update data petugas
        $daffapetugas->nama_petugas = $request->daffanama;
        $daffapetugas->username = $request->daffauser;
        $daffapetugas->telp = $request->daffatelp;
        $daffapetugas->level = $request->daffalevel;

        // Update password jika tidak kosong
        if (!empty($request->daffapassword)) {
            $daffapetugas->password = Hash::make($request->daffapassword);
        }

        $daffapetugas->save();

        return redirect('/petugas')->with('success', 'Data petugas berhasil diperbarui.');
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
