@extends('layouts.app')

@section('title', 'Edit Seminar')

@section('content')
    <h2>Edit Seminar</h2>

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

    <form action="{{ route('seminar.update', $seminar->id_seminar) }}" method="POST" enctype="multipart/form-data" class="vintage-card">
        @csrf
        @method('PUT')

        <div>
            <label for="judul">Judul Seminar:</label><br>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $seminar->judul) }}" required>
        </div><br>

        <div>
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea name="deskripsi" id="deskripsi" rows="4" required>{{ old('deskripsi', $seminar->deskripsi) }}</textarea>
        </div><br>

        <div>
            <label for="foto">Upload Foto:</label><br>
            @if($seminar->foto)
                <img src="{{ asset('storage/' . $seminar->foto) }}" alt="{{ $seminar->judul }}" style="width:150px; margin-bottom:10px; border-radius:6px;">
            @endif
            <input type="file" name="foto" id="foto">
        </div><br>

        <div>
            <label for="jenis">Jenis Seminar:</label><br>
            <select name="jenis" id="jenis" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="skripsi" {{ old('jenis', $seminar->jenis) == 'skripsi' ? 'selected' : '' }}>Skripsi</option>
                <option value="workshop" {{ old('jenis', $seminar->jenis) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                <option value="umum" {{ old('jenis', $seminar->jenis) == 'umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </div><br>

        <div>
            <label for="lokasi">Lokasi:</label><br>
            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $seminar->lokasi) }}" required>
        </div><br>

        <div>
            <label for="waktu">Waktu:</label><br>
            <input type="datetime-local" name="waktu" id="waktu" value="{{ old('waktu', \Carbon\Carbon::parse($seminar->waktu)->format('Y-m-d\TH:i')) }}" required>
        </div><br>

        <div>
            <label for="kuota">Kuota:</label><br>
            <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $seminar->kuota) }}" required>
        </div><br>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('seminar.index') }}" class="btn btn-danger">Batal</a>
    </form>
@endsection
