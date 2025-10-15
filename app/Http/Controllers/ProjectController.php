<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Tampilkan semua proyek
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Form tambah proyek
    public function create()
    {
        return view('projects.create');
    }

    // Simpan proyek baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'created_by' => Auth::id() ?? 1, // sementara default ke user 1
        ]);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    // Lihat detail proyek
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Form edit proyek
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Update proyek
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    // Hapus proyek
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
