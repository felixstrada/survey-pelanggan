<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    // Menampilkan halaman formulir survei untuk publik berdasarkan token
    public function index($token=null)
    {
        return view('survey.index', compact('token'));
    }

    // Menyimpan data survei dari pengguna
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'no_whatsapp'   => 'required|numeric',
            'email'          => 'required|email|max:255',
            'sosialmedia'    => 'nullable|string|max:255',
            'rating'         => 'required|integer|min:1|max:5',
            'masukan_saran'  => 'nullable|string',
        ]);

        Survey::create($request->all());

        return redirect()->back()->with('success', 'Terima kasih! Masukan Anda sangat berharga bagi kami.');
    }

    // Menampilkan halaman dashboard admin
    public function dashboard()
    {
        $surveys = Survey::latest()->paginate(10);
        $totalSurvey = Survey::count();
        $averageRating = Survey::avg('rating');

        return view('dashboard', compact('surveys', 'totalSurvey', 'averageRating'));
    }
}
