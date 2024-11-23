<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Http\daffarequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilan Login
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'daffausername' => 'required',
            'daffapassword' => 'required',
        ], [
            'daffausername.required' => 'Username harus diisi',
            'daffapassword.required' => 'Password harus diisi',
        ]);

        $daffausername = $request->daffausername;
        $daffapassword = $request->daffapassword;

        // Cek tabel petugas
        $daffapetugas = Petugas::where('username', $daffausername)->first();
        if ($daffapetugas) {
            if (Hash::check($daffapassword, $daffapetugas->password)) {
                session([
                    'daffaid' => $daffapetugas->id_petugas,
                    'daffanama' => $daffapetugas->nama_petugas,
                    'daffalevel' => $daffapetugas->level,
                ]);

                // **Log aktivitas petugas**
                Log::create([
                    'id_petugas' => $daffapetugas->id_petugas,
                    'keterangan' => 'Login Kedalam Aplikasi',
                    'timestamp' => now(),
                ]);

                if ($daffapetugas->level === 'petugas') {
                    return redirect('/petugas_index');
                } elseif ($daffapetugas->level === 'admin') {
                    return redirect('/admin_index');
                }
            } else {
                return back()->withErrors(['password' => 'Kata sandi salah']);
            }
        }

        // Cek tabel masyarakat
        $daffamasyarakat = Masyarakat::where('username', $daffausername)->first();
        if ($daffamasyarakat) {
            if (Hash::check($daffapassword, $daffamasyarakat->password)) {
                session([
                    'daffaid' => $daffamasyarakat->id,
                    'daffanik' => $daffamasyarakat->nik,
                    'daffanama' => $daffamasyarakat->nama,
                    'daffalevel' => $daffamasyarakat->level,
                ]);

                return redirect('/masyarakat_index');
            } else {
                return back()->withErrors(['password' => 'Kata sandi salah']);
            }
        }


        return back()->withErrors(['daffausername' => 'Nama pengguna tidak ditemukan']);
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
    public function store(Request $daffarequest)
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
    public function update(Request $daffarequest, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(string $id)
    {
        // Logout

        session()->flush();

        return redirect('/login');
    }
}
