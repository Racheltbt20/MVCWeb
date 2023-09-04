<?php

namespace App\Http\Controllers;

use File;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SiswaController extends Controller
{
    //read
    public function index() {
        $datas = Siswa::all();
        return view('admin.mastersiswa', compact('datas'));
    }

    //create
    public function create() {
        return view('admin.tambahsiswa');
    }

    //simpan data create
    public function store(Request $request) {

        // custom message
        $message=[
            'required' => 'Heh ketinggalan :attribute mu',
            'min' => 'kurang :attribute mu,  minimal :min karakter',
            'max' => 'kelebihan :atrribute mu, maksimal :max karakter',
            'mimes' => 'file :attribute salah, harus bertipe jpg, jpeg, atau png'
        ];

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'about' => 'required|min:5',
            'photo' => 'required|mimes:jpg,jpeg,png'
        ], $message);

        $validatedData['photo'] = $request->file('photo')->store('photos');

        Siswa::create($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    //edit
    public function edit($id) {
        $data = Siswa::find($id);
        return view('admin.editsiswa', compact('data'));
    }

    //simpan data edit
    public function update($id, Request $request) {
        
        // custom message
        $message=[
            'required' => 'Heh ketinggalan :attribute mu',
            'min' => 'kurang :attribute mu,  minimal :min karakter',
            'max' => 'kelebihan :atrribute mu, maksimal :max karakter',
            'mimes' => 'file :attribute salah, harus bertipe jpg, jpeg, atau png'
        ];

        // validasi request form
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'about' => 'required|min:5',
            'photo' => 'mimes:jpg,jpeg,png'
        ], $message);

        if($request->file('photo')) {
            if($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('photos');
        }

        // Siswa::find($id)->update($request->all());

        Siswa::where('id', $request->id)
                ->update($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah!');
    }

    //delete
    public function delete($id) {
        $data = Siswa::find($id);

        if($data->photo) {
            Storage::delete($data->photo);
        }

        $data->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
