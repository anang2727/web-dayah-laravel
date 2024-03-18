<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Santri;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        $santris = Santri::all();
        $users = User::all();

        return view('admin.dashboard', compact('gurus', 'santris', 'users'));
    }
    
}
