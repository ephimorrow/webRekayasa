@extends('layouts.app')

@section('title', 'Tambah Seminar')

@section('content')
    <h2>Tambah Seminar</h2>

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert-success" style="background:#ffd9e0; color:#4a2e1c; padding:10px; border-radius:5px;">
            <strong>Periksa input Anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('seminar.store') }}" method="POST" enctype="multipart/form-data" class="vintage-card">
        @csrf

        {{-- Judul --}}
        <div>
            <label for="judul">Judul Seminar:</label><br>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required>
        </div><br>

        {{-- Deskripsi --}}
        <div>
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea name="deskripsi" id="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div><br>

        {{-- Foto --}}
        <div>
            <label for="foto">Upload Foto:</label><br>
            <input type="file" name="foto" id="foto" accept="image/*">
        </div><br>

        {{-- Jenis --}}
        <div>
            <label for="jenis">Jenis Seminar:</label><br>
            <select name="jenis" id="jenis" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="skripsi" {{ old('jenis') == 'skripsi' ? 'selected' : '' }}>Skripsi</option>
                <option value="workshop" {{ old('jenis') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                <option value="umum" {{ old('jenis') == 'umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </div><br>

        {{-- Lokasi --}}
        <div>
            <label for="lokasi">Lokasi:</label><br>
            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" required>
        </div><br>

        {{-- Waktu --}}
        <div>
            <label for="waktu">Waktu:</label><br>
            <input type="datetime-local" name="waktu" id="waktu" value="{{ old('waktu') }}" required>
        </div><br>

        {{-- Kuota --}}
        <div>
            <label for="kuota">Kuota:</label><br>
            <input type="number" name="kuota" id="kuota" value="{{ old('kuota') }}" required>
        </div><br>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('seminar.index') }}" class="btn btn-danger">Batal</a>
    </form>
@endsection
