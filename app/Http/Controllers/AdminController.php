<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    Public function index() {
        return view('admin.dashboard');
    }
}
