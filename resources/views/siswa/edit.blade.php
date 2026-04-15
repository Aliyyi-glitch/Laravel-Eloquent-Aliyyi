@extends('layouts.main')
@section('title', 'Edit Siswa')
@section('content')
<div class="card" style="max-width:500px;margin:auto">
    <h1>✏️ Edit Siswa</h1>
    <form method="POST" action="/siswa/{{ $siswa->id }}">
        @csrf @method('PUT')
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="{{ $siswa->nama }}" required>

        <label>Nomor Absen</label>
        <input type="text" name="absen" value="{{ $siswa->absen }}" required>

        <label>Kelas</label>
        <input type="text" name="kelas" value="{{ $siswa->kelas }}" required>

        <button type="submit" class="btn btn-warning">🔄 Update</button>
        <a href="/siswa" class="btn btn-danger" style="margin-left:0.5rem">Batal</a>
    </form>
</div>
@endsection