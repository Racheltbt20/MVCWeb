<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //read
    Public function index() {
        $data = Contact::all();
        return $data;
    }

    //create
    public function create() {

    }

    //simpan data create
    public function store(Request $request) {
        Contact::create($request->all());
    }

    //edit
    public function edit($id) {
        $data = Contact::find($id);
        return $data;
    }

    //simpan data edit
    public function update($id, Request $request) {
        Contact::find($id)->update([$request->all()]);
    }

    //delete
    public function delete($id) {
        Contact::find($id)->delete();
    }
}
