<?php

namespace App\Http\Controllers;

use App\Models\MasterProject;
use App\Models\MasterSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MasterProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->except(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = MasterSiswa::get();
        $project = MasterProject::get();
        return view('admin.master-project.index', compact('project', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    function add($id) {
        $siswa = MasterSiswa::find($id);
        return view('admin.master-project.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'project_name' => 'required|string|min:8|max:20',
            'project_date' => 'required',
            'photo' => 'nullable',
            'file' => 'required|mimes:jpg,jpeg,png',
        ]);
        

        if ($request->file('file')) {
            $file_name = time() . '-' . $request->file('file')->getClientOriginalName();
            $image = $request->file('file')->storeAs('public/project', $file_name);
            $request['photo'] = $file_name;
        }

        MasterProject::create($request->all());

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = MasterSiswa::find($id)->project()->get();
        return view('admin.master-project.show-project', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterProject $project)
    {
        $project->siswa();
        return view('admin.master-project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterProject $project)
    {


        $request->validate([
            'project_name' => 'required|string|min:8|max:20',
            'project_date' => 'required',
            'photo' => 'nullable',
            'file' => 'required|mimes:jpg,png,jpeg',
        ]);
        
        
        if ($request->file('file')) {
            File ::delete('storage/project/'. $project->photo);
            $file_name = time() . '-' . $request->file('file')->getClientOriginalName();
            $image = $request->file('file')->storeAs('public/project', $file_name);
            $project->photo = $file_name;
        };
        
        $project->project_name = $request->project_name;
        $project->project_date = $request->project_date;
        $project->save();
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterProject $project)
    {
        File ::delete('storage/project/'. $project->photo);
        MasterProject::destroy($project->id);
        return redirect()->back();
    }
}
