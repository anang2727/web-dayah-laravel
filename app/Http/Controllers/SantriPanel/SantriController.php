<?php

namespace App\Http\Controllers\SantriPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::all();
        return view('santri.dashboard', compact('santris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_santri' => 'required',
            'nik' => 'required',
            'no_kk' => 'required', // Tambahkan validasi untuk kolom 'no_kk'
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama_santri.required' => 'Nama Santri harus diisi.',
            'nik.required' => 'NIK harus diisi.',
            'no_kk.required' => 'Nomor KK harus diisi.', // Pesan untuk validasi kolom 'no_kk'
            'image.required' => 'Gambar harus diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('santri', 'public');
        }

        Santri::create($data);

        return redirect()->route('santri.dashboard')->with('success', 'Data santri berhasil disimpan.');
    }

    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        return view('santri.edit', compact('santri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_santri' => 'required',
            'nik' => 'required',
            'no_kk' => 'required', // Tambahkan validasi untuk kolom 'no_kk'
        ], [
            'nama_santri.required' => 'Nama Santri harus diisi.',
            'nik.required' => 'NIK harus diisi.',
            'no_kk.required' => 'Nomor KK harus diisi.', // Pesan untuk validasi kolom 'no_kk'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('santri', 'public');
        }

        Santri::findOrFail($id)->update($data);

        return redirect()->route('santri.dashboard')->with('success', 'Data santri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Santri::findOrFail($id)->delete();
        return redirect()->route('santri.dashboard')->with('success', 'Data santri berhasil dihapus.');
    }

    public function show($id)
    {
        $santri = Santri::findOrFail($id);
        return view('santri.show', compact('santri'));
    }
}
