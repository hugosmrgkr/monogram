<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    // Menampilkan halaman gallery
    public function index(Request $request)
    {
        $kategoriList = ['Wisuda', 'Keluarga', 'Pasangan', 'Pertemanan', 'Lainnya'];
        $title = 'Gallery Page';
        $kategori = $request->input('kategori', 'Semua');

        if ($kategori !== 'Semua') {
            $galleries = Gallery::where('kategori', $kategori)->latest()->get();
        } else {
            $galleries = Gallery::latest()->get();
        }

        return view('admin.gallery.index', compact('galleries', 'title', 'kategoriList', 'kategori'));
    }

    public function create()
    {
        $kategoriList = ['Wisuda', 'Keluarga', 'Pasangan', 'Pertemanan', 'Lainnya'];

        return view('admin.gallery.create', [
            'title' => 'Buat Galeri',
            'kategoriList' => $kategoriList,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|string|in:Wisuda,Keluarga,Pasangan,Pertemanan,Lainnya',
            'gambar' => 'required|array',
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:4096',
        ]);

        foreach ($request->file('gambar') as $file) {
            $path = $file->store('gallery', 'public');

            Gallery::create([
                'kategori' => $request->kategori,
                'gambar' => $path,
                'admin_id' => Auth::id(),
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit gambar
    public function edit(Gallery $gallery)
    {
        $kategoriList = ['Wisuda', 'Keluarga', 'Pasangan', 'Pertemanan', 'Lainnya'];

        return view('admin.gallery.edit', [
            'title' => 'Edit Galeri',
            'gallery' => $gallery,
            'kategoriList' => $kategoriList,
        ]);
    }

    // Memperbarui data gambar
    public function update(Request $request, Gallery $gallery)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|string|in:Wisuda,Keluarga,Pasangan,Pertemanan,Lainnya',
        ]);

        // Cek apakah ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            ]);

            // Hapus gambar lama jika ada
            if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
                Storage::disk('public')->delete($gallery->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('gallery', 'public');
            $gallery->gambar = $path;
        }

        // Update kategori
        $gallery->kategori = $request->kategori;
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil diperbarui!');
    }

    // Menghapus gambar
    public function destroy(Gallery $gallery)
    {
        // Hapus gambar jika ada
        if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
            Storage::disk('public')->delete($gallery->gambar);
        }

        // Hapus data gallery
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
