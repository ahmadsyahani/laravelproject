<?php

namespace App\Http\Controllers;

use App\Models\MasterSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MasterSiswaController extends Controller
{
    function index() {
        $siswa = MasterSiswa::get();
        return view('admin.master-siswa.index', compact('siswa'));
    }

    function create() {
        return view('admin.master-siswa.create');
    }
    
    function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'photo' => 'nullable'
        ]);

        $siswa = new MasterSiswa();
        if ($request->file('photo')) {
            $photo_name = time() . '-' . $request->file('photo')->getClientOriginalName();
            $image = $request->file('photo')->storeAs('public/siswa', $photo_name);
            $siswa->photo = $photo_name;
        };
        
        $siswa->name = $request->name;
        $siswa->about = $request->about;
        $siswa->save();
        return redirect()->route('siswa.index');
    }
    
    function edit(MasterSiswa $siswa) {
        return view('admin.master-siswa.edit', compact('siswa'));
    }
    
    function update(Request $request, MasterSiswa $siswa) {
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'photo' => 'nullable'
        ]);
        if ($request->file('photo')) {
            File ::delete('storage/siswa/'. $siswa->photo);
            $photo_name = time() . '-' . $request->file('photo')->getClientOriginalName();
            $image = $request->file('photo')->storeAs('public/siswa', $photo_name);
            $siswa->photo = $photo_name;
        };
        
        $siswa->name = $request->name;
        $siswa->about = $request->about;
        $siswa->save();
        return redirect()->route('siswa.index');
    }

    function destroy(MasterSiswa $siswa) {
        File ::delete('storage/siswa/'. $siswa->photo);
        MasterSiswa::destroy($siswa->id);
        return redirect()->back();
    }


}
