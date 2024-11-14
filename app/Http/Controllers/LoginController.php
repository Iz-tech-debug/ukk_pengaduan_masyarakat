<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;
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

    public function login(request $request)
    {
        $request->validate([
            'daffausername' => 'required',
            'daffapassword' => 'required',
        ]);

        $daffausername = $request->daffausername;
        $daffapassword = $request->daffapassword;

        $daffapetugas = Petugas::where('username', $daffausername)->first();

        if ($daffapetugas) {
            if (Hash::check($daffapassword, $daffapetugas->password)) {
                if ($daffapetugas->level === 'admin') {
                    return redirect('/admin');;
                } elseif ($daffapetugas->level === 'petugas') {
                    return redirect('/petugas');
                }
            } else {
                return back()->withErrors(['password' => 'Password salah untuk Petugas']);
            }
        }

        $daffamasyarakat = Masyarakat::where('username', $daffausername)->first();
        if ($daffamasyarakat) {
            if (Hash::check($daffapassword, hashedValue: $daffamasyarakat->password)) {
                return 'Hallo Budak Korporat';
            } else {
                return back()->withErrors(['password' => 'Password salah untuk Masyarakat']);
            }
        }
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
