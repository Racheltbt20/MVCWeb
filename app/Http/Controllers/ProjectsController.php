<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function projecthome() {
        return view('projects');
    }

    public function __construct()
    {
        $this->middleware(['role:admin'])->except('index', 'show', 'projecthome');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all('id', 'name');
        return view('admin.masterproject', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    
    public function add($id) {  
        $siswa = Siswa::find($id);
        return view('admin.tambahproject', compact('siswa'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // custom message
        $message=[
            'required' => 'Heh ketinggalan :attribute mu',
            'min' => 'kurang :attribute mu,  minimal :min karakter',
            'max' => 'kelebihan :atrribute mu, maksimal :max karakter',
            'mimes' => 'file :attribute salah, harus bertipe jpg, jpeg, atau png'
        ];

        $validatedData = $request->validate([
            'project_name' => 'required|min:5|max:20',
            'project_date' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png'
        ], $message);

        $validatedData['siswa_id'] = $request->siswa_id;

        $validatedData['photo'] = $request->file('photo')->store('project');

        Project::create($validatedData);

        return redirect()->route('project.index')->with('success', 'Data project berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::find($id)->project()->get();
        return view('admin.showproject', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('admin.editproject', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);

        // custom message
        $message=[
            'required' => 'Heh ketinggalan :attribute mu',
            'min' => 'kurang :attribute mu,  minimal :min karakter',
            'max' => 'kelebihan :atrribute mu, maksimal :max karakter',
            'mimes' => 'file :attribute salah, harus bertipe jpg, jpeg, atau png'
        ];

        // validasi request form
        $validatedData = $request->validate([
            'project_name' => 'required|min:5|max:20',
            'project_date' => 'required',
            'photo' => 'mimes:jpg,jpeg,png'
        ], $message);

        
        if($request->file('photo')) {
            if($request->oldProject) {
                Storage::delete($request->oldProject);
            }
            $validatedData['photo'] = $request->file('photo')->store('project');
        }
        
        // Project::find($id)->update($request->all());

        // Project::where('id', $request->id)
        //         ->update($validatedData);

        $project->update($validatedData);

        return redirect()->route('project.index')->with('success', 'Data project berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Project::find($id);

        if($data->photo) {
            Storage::delete($data->photo);
        }

        $data->delete();

        return redirect()->route('project.index')->with('success', 'Data project berhasil dihapus!');
    }
}
 