<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function create()
    {
        $siswas = Siswa::all();
        return view('nilai.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'       => 'required',
            'mata_pelajaran' => 'required',
            'nilai'          => 'required|integer|min:0|max:100',
        ]);

        Nilai::create($request->only(['siswa_id', 'mata_pelajaran', 'nilai']));
        return redirect('/siswa/nilai')->with('success', 'Nilai berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Nilai::destroy($id);
        return redirect('/siswa/nilai')->with('success', 'Nilai dihapus!');
    }
}