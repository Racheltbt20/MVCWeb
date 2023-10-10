<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistrasiController extends Controller
{
    public function index() {
        return view('registrasi');
    }

    public function store(Request $request) {
        $message = [
            'required' => ':attribure harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'unique' => ':attribute sudah terdaftar'
        ];

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ], $message);

        // dd($validatedData);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        toastr()->success('Silahkan Login terlebih dahulu!', 'Berhasil Registrasi');
        return redirect()->route('login.index');
    }
}
