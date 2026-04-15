<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // READ + SEARCH (Tugas No. 3 — fitur search)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $siswas = Siswa::with('nilais')
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('kelas', 'like', "%{$search}%")
                      ->orWhere('absen', 'like', "%{$search}%");
            })
            ->paginate(5); // pagination sekalian

        return view('siswa.index', compact('siswas', 'search'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'absen'  => 'required',
            'kelas'  => 'required',
        ]);

        Siswa::create($request->only(['nama', 'absen', 'kelas']));
        return redirect('/siswa')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->only(['nama', 'absen', 'kelas']));
        return redirect('/siswa')->with('success', 'Data siswa diperbarui!');
    }

    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect('/siswa')->with('success', 'Siswa berhasil dihapus!');
    }

    // Tugas No. 2 — Tampilkan join Siswa + Nilai
    public function nilaiSiswa()
    {
        $data = Siswa::with('nilais')->get();
        return view('siswa.nilai', compact('data'));
    }
}