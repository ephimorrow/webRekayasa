<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::all();
        return view('seminar.index', compact('seminars'));
    }

    public function create()
    {
        return view('seminar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lokasi' => 'required|string',
            'waktu' => 'required|date',
            'jenis' => 'required|in:skripsi,umum,workshop',
            'deskripsi' => 'required|string',
            'kuota' => 'required|string|max:250',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Seminar::create($validated);

        return redirect()->route('seminar.index')->with('success', 'Seminar berhasil ditambahkan!');
    }

    public function edit(Seminar $seminar)
    {
        return view('seminar.edit', compact('seminar'));
    }

    public function update(Request $request, Seminar $seminar)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lokasi' => 'required|string',
            'waktu' => 'required|date',
            'jenis' => 'required|in:skripsi,umum,workshop',
        ]);

        if ($request->hasFile('foto')) {
            if ($seminar->foto) {
                Storage::disk('public')->delete($seminar->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $seminar->update($validated);

        return redirect()->route('seminar.index')->with('success', 'Seminar berhasil diperbarui!');
    }

    public function destroy(Seminar $seminar)
    {
        if ($seminar->foto) {
            Storage::disk('public')->delete($seminar->foto);
        }

        $seminar->delete();
        return redirect()->route('seminar.index')->with('success', 'Seminar berhasil dihapus!');
    }
}
