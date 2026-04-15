@extends('layouts.main')
@section('title', 'Nilai Siswa')
@section('content')
<div class="card">
    <h1>📊 Rekap Nilai Siswa</h1>
    <p style="color:#888;margin-bottom:1rem">
        Menampilkan data join antara tabel <b style="color:#a78bfa">siswas</b>
        dan tabel <b style="color:#a78bfa">nilais</b>
    </p>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="/nilai/create" class="btn btn-primary" style="margin-bottom:1rem">
        + Tambah Nilai
    </a>

    @foreach($data as $siswa)
    <div style="margin-bottom:1.5rem;border:1px solid #2d2d4e;border-radius:10px;overflow:hidden">
        <div style="background:#16213e;padding:0.8rem 1.2rem;display:flex;
                    justify-content:space-between;align-items:center">
            <span>
                <span class="badge badge-purple">{{ $siswa->absen }}</span>
                <b style="margin-left:0.5rem;color:#e0e0e0">{{ $siswa->nama }}</b>
                <span style="color:#888;margin-left:0.5rem">— {{ $siswa->kelas }}</span>
            </span>
            <span class="badge badge-green">{{ $siswa->nilais->count() }} mata pelajaran</span>
        </div>

        @if($siswa->nilais->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Grade</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa->nilais as $nilai)
                <tr>
                    <td>{{ $nilai->mata_pelajaran }}</td>
                    <td><b>{{ $nilai->nilai }}</b></td>
                    <td>
                        @if($nilai->nilai >= 90)
                            <span class="badge badge-green">A</span>
                        @elseif($nilai->nilai >= 80)
                            <span class="badge badge-purple">B</span>
                        @elseif($nilai->nilai >= 70)
                            <span class="badge" style="background:#78350f;color:#fde68a">C</span>
                        @else
                            <span class="badge badge-red">D</span>
                        @endif
                    </td>
                    <td>
                        <form action="/nilai/{{ $nilai->id }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger"
                                onclick="return confirm('Hapus nilai ini?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p style="padding:1rem;color:#888;text-align:center">
            Belum ada data nilai untuk siswa ini.
        </p>
        @endif
    </div>
    @endforeach
</div>
@endsection