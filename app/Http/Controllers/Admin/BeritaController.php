<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        $title = 'Daftar Berita';
        return view('admin.pages.berita.index', [
            'beritas' => Berita::all(),
            'title' => 'Daftar Berita'
        ]);
    }

    public function create()
    {
        return view('admin.pages.berita.create', [
            'title' => 'Buat Berita'
        ]);
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

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        return view('admin.pages.berita.edit', [
            'title' => 'Edit Berita',
            'berita' => Berita::findOrFail($id)
        ]);
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

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        // Hapus gambar jika ada
        if ($berita->gambar) {
            Storage::delete('public/' . $berita->gambar);
        }
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
