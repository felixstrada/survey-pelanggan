<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SurveyController extends Controller
{
    // =========================================================
    // 1. HALAMAN PUBLIK (PELANGGAN)
    // =========================================================

    // Menampilkan form survei publik (index.blade.php)
    public function index()
    {
        return view('survey.index');
    }

    // Menyimpan data survei dari pelanggan (hanya boleh ada 1 method ini)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:20',
            'email'           => 'required|email|max:255',
            'sosialmedia'    => 'nullable|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'masukan_saran'   => 'nullable|string',
        ]);

        Survey::create($validated);

        return redirect()->back()->with('success', 'Terima kasih! Masukan Anda sangat berharga bagi kami.');
    }

    // =========================================================
    // 2. HALAMAN PRIVATE (ADMIN / DASHBOARD)
    // =========================================================

    // Menampilkan halaman dashboard admin
    public function dashboard()
    {
        $totalSurvey = Survey::count();
        $avgRating = Survey::avg('rating') ?? 0;
        $surveys = Survey::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard', compact('surveys', 'totalSurvey', 'avgRating'));
    }

    // Mengunduh laporan berbentuk PDF
    public function exportPdf()
    {
        $surveys = Survey::orderBy('created_at', 'desc')->get();
        $pdf = Pdf::loadView('pdf.surveys', compact('surveys'));

        return $pdf->download('laporan-survei-pelanggan.pdf');
    }
}