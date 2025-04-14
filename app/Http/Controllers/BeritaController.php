<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();  // Ambil semua data berita
        $title = 'Daftar Berita';  // Tentukan judul halaman
        return view('admin.pages.berita.index', compact('beritas', 'title'));
    }

    public function create()
    {
        return view('admin.pages.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_habis' => 'required|date',
        ]);

        $gambarPath = null;

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_habis' => $request->tanggal_habis,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.pages.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_habis' => 'required|date',
        ]);

        $berita = Berita::findOrFail($id);
        $gambarPath = $berita->gambar;

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gambarPath) {
                Storage::delete('public/' . $gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_habis' => $request->tanggal_habis,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        // Hapus gambar jika ada
        if ($berita->gambar) {
            Storage::delete('public/' . $berita->gambar);
        }
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
