<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $messsage = [
            'required' => ':attribute salah'
        ];

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $messsage);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            toastr()->success('', 'Berhasil Login');
            return redirect()->intended(route('admin'));
        }

        toastr()->error('', 'Login gagal!');
        return back();
    }

    public function logout(Request $request) {

        // dd('tes');

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->route('login.index');
    }

    public function abort() {
        abort(404);
    }
}
