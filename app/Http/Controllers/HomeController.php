<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $query = Seminar::query();

        // Filter berdasarkan jenis jika ada
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        $seminars = $query->latest()->get();

        return view('home', compact('seminars'));
    }
}