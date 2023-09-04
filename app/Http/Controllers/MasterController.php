<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    Public function mastersiswa() {
        return view('admin.mastersiswa');
    }

    Public function tambahsiswa() {
        return view('admin.tambahsiswa');
    }

    Public function editsiswa() {
        return view('admin.editsiswa');
    }


    Public function masterproject() {
        return view('admin.masterproject');
    }

    Public function mastercontact() {
        return view('admin.mastercontact');
    }
}
