@extends('layouts.main')
@section('title', 'Tambah Siswa')
@section('content')
<div class="card" style="max-width:500px;margin:auto">
    <h1>➕ Tambah Siswa</h1>
    <form method="POST" action="/siswa">
        @csrf
        <label>Nama Lengkap</label>
        <input type="text" name="nama" placeholder="Masukkan nama..." required>

        <label>Nomor Absen</label>
        <input type="text" name="absen" placeholder="Contoh: 01" required>

        <label>Kelas</label>
        <input type="text" name="kelas" placeholder="Contoh: XI RPL 1" required>

        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="/siswa" class="btn btn-danger" style="margin-left:0.5rem">Batal</a>
    </form>
</div>
@endsection