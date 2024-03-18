<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = User::all();

        return view('users.dashboard', [
            'users' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,guru,santri',
        ]);

        // Membuat data pengguna baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        // Menyimpan data pengguna ke dalam database
        $user->save();

        // Mengembalikan respons atau mengarahkan ke halaman yang sesuai
        return redirect()->back()->with('success', 'Data pengguna berhasil disimpan.');
    }


    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,guru,santri',
        ]);

        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui data pengguna
        $user->name = $request->name;
        $user->email = $request->email;

        // Periksa apakah password baru disertakan dalam permintaan
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->role = $request->role;

        // Simpan perubahan
        $user->save();

        // Mengembalikan respons atau mengarahkan ke halaman yang sesuai
        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Hapus pengguna dari database
        $user->delete();
    
        // Redirect kembali dengan pesan sukses atau response JSON sesuai kebutuhan
        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus.');
    }
    
}
