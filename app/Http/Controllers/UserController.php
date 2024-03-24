<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     */
    public function index()
    {
        $users = User::all(); // Contoh kueri untuk mengambil semua data guru
        return view('users.dashboard', ['users' => $users]);
    }

    /**
     * Menyimpan data pengguna baru.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'show_password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,guru,santri',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'show_password' => $request->show_password,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->back()->with('success', 'Data User berhasil disimpan.');

        //  return redirect()->route('users.dashboard')->with('success', 'Data pengguna berhasil disimpan.');
    }

    /**
     * Menampilkan data pengguna tertentu.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Menampilkan form untuk mengedit data pengguna.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Memperbarui data pengguna.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,guru,santri',
        ]);
    
        // Periksa apakah ada perubahan pada password
        if ($request->filled('password')) {
            $password = Hash::make($request->password);
        } else {
            // Jika tidak ada perubahan, gunakan password yang sudah ada tanpa meng-hash lagi
            $password = $user->password;
        }
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            'role' => $request->role,
            'show_password' => $request->password,
        ]);
        
    
        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui.');
    }
    

    /**
     * Menghapus data pengguna.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus.');
    }
}
