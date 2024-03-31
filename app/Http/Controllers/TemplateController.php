<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Santri;

class TemplateController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        $santris = Santri::all();
        $totalSantri = Santri::count(); // Menghitung jumlah total santri
        $totalGuru = Guru::count(); // Menghitung jumlah total guru

        // Mengirim data ke view 'welcome'
        return view('welcome', compact('gurus', 'santris', 'totalSantri', 'totalGuru'));
    }
}
