<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    //read
    Public function index() {
        $data = Project::all();
        return $data;
    }

    //create
    public function create() {

    }

    //simpan data create
    public function store(Request $request) {
        Project::create($request->all());
    }

    //edit
    public function edit($id) {
        $data = Project::find($id);
        return $data;
    }

    //simpan data edit
    public function update($id, Request $request) {
        Project::find($id)->update([$request->all()]);
    }

    //delete
    public function delete($id) {
        Project::find($id)->delete();
    }
}
