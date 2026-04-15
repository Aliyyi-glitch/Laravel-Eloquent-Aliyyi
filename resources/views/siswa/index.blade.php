@extends('layouts.main')
@section('title', 'Data Siswa')
@section('content')
<div class="card">
    <h1>👥 Data Siswa</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    {{-- Search Bar (Tugas No. 3) --}}
    <form method="GET" action="/siswa" class="search-bar">
        <input type="text" name="search" placeholder="Cari nama, kelas, atau absen..."
               value="{{ $search ?? '' }}">
        <button type="submit" class="btn btn-primary">🔍 Cari</button>
        <a href="/siswa" class="btn btn-warning">Reset</a>
        <a href="/siswa/create" class="btn btn-success">+ Tambah Siswa</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Absen</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jumlah Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswas as $i => $siswa)
            <tr>
                <td>{{ $siswas->firstItem() + $i }}</td>
                <td><span class="badge badge-purple">{{ $siswa->absen }}</span></td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td><span class="badge badge-green">{{ $siswa->nilais->count() }} mapel</span></td>
                <td>
                    <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning">✏️ Edit</a>
                    <form action="/siswa/{{ $siswa->id }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger"
                            onclick="return confirm('Hapus siswa ini?')">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;color:#888">
                    Tidak ada data ditemukan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination Wrapper --}}
    <div class="pagination-wrapper">
        {{ $siswas->appends(['search' => $search])->links() }}
    </div>
</div>
@endsection
