@extends('layouts.main')
@section('title', 'Tambah Nilai')
@section('content')
<div class="card" style="max-width:500px;margin:auto">
    <h1>📝 Tambah Nilai</h1>
    <form method="POST" action="/nilai">
        @csrf
        <label>Siswa</label>
        <select name="siswa_id" required>
            <option value="">-- Pilih Siswa --</option>
            @foreach($siswas as $siswa)
            <option value="{{ $siswa->id }}">
                [{{ $siswa->absen }}] {{ $siswa->nama }} - {{ $siswa->kelas }}
            </option>
            @endforeach
        </select>

        <label>Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" placeholder="Contoh: Matematika" required>

        <label>Nilai (0-100)</label>
        <input type="number" name="nilai" min="0" max="100" placeholder="Contoh: 85" required>

        <button type="submit" class="btn btn-success">💾 Simpan Nilai</button>
        <a href="/siswa/nilai" class="btn btn-danger" style="margin-left:0.5rem">Batal</a>
    </form>
</div>
@endsection