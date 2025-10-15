@extends('layouts.app')

@section('title', 'Data Seminar')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Manajemen Data Seminar</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol tambah --}}
    <div class="mb-3 text-end">
        <a href="{{ route('seminar.create') }}" class="btn btn-pink">+ Tambah Seminar</a>
    </div>

    {{-- Tabel Data Seminar --}}
    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Jenis</th>
                <th>Lokasi</th>
                <th>Waktu</th>
                <th>Kuota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($seminars as $index => $seminar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $seminar->judul }}</td>
                    <td>
                        @if ($seminar->foto)
                            <img src="{{ asset('storage/' . $seminar->foto) }}" 
                                 alt="Foto {{ $seminar->judul }}" 
                                 width="100" 
                                 height="70"
                                 style="object-fit: cover; border-radius: 5px;">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                    <td>{{ ucfirst($seminar->jenis) }}</td>
                    <td>{{ $seminar->lokasi }}</td>
                    <td>{{ \Carbon\Carbon::parse($seminar->waktu)->format('d M Y, H:i') }}</td>
                    <td>{{ $seminar->kuota }}</td>
                    <td>
                        <a href="{{ route('seminar.edit', $seminar->id_seminar) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('seminar.destroy', $seminar->id_seminar) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Yakin ingin menghapus seminar ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Belum ada data seminar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection