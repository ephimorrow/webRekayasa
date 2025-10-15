<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('project')->get();
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('modules.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        Module::create($request->all());
        return redirect()->route('modules.index')->with('success', 'Modul berhasil ditambahkan!');
    }

    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    public function edit(Module $module)
    {
        $projects = Project::all();
        return view('modules.edit', compact('module', 'projects'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $module->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Modul berhasil diperbarui!');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Modul berhasil dihapus!');
    }
}
