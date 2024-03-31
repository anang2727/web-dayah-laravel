<?php

namespace App\Http\Controllers\GuruPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $items = Guru::all();

        return view('guru.dashboard', [
            'gurus' => $items
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'no_ktp' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama_guru.required' => 'Nama Guru harus diisi.',
            'no_ktp.required' => 'NO KTP harus diisi.',
            'image.required' => 'Gambar harus diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $data = $request->all();
            $data['image'] = $request->file('image')->store('guru', 'public');
            Guru::create($data);
            return redirect()->back()->with('success', 'Data Guru berhasil disimpan.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah gambar.');
    }

    public function edit($id)
    {
        $item = Guru::findOrFail($id);

        return view('guru.edit', [
            'guru' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required',
            'no_ktp' => 'required',
            // Tambahkan validasi untuk kolom lain di sini sesuai kebutuhan
        ], [
            'nama_guru.required' => 'Nama Guru harus diisi.',
            'no_ktp.required' => 'NO KTP harus diisi.',
            // Tambahkan pesan untuk validasi kolom lain di sini sesuai kebutuhan
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('guru', 'public');
        }

        Guru::findOrFail($id)->update($data);

        return redirect()->route('guru.dashboard')->with('success', 'Data Guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Guru::findOrFail($id)->delete();
        return redirect()->route('guru.dashboard')->with('success', 'Data Guru berhasil dihapus.');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }
}
