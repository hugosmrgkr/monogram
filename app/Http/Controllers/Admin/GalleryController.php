<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Menampilkan galeri untuk user berdasarkan kategori
    public function userView()
    {
        $wisuda     = Gallery::where('kategori', 'Wisuda')->get();
        $keluarga   = Gallery::where('kategori', 'Keluarga')->get();
        $pasangan   = Gallery::where('kategori', 'Pasangan')->get();
        $pertemanan = Gallery::where('kategori', 'Pertemanan')->get();
        $lainnya    = Gallery::where('kategori', 'Lainnya')->get();

        return view('user.gallery', compact('wisuda', 'keluarga', 'pasangan', 'pertemanan', 'lainnya'));
    }


    // Menampilkan semua gambar di dashboard admin
    public function index()
    {
        $galleries = Gallery::latest()->get();
        $title = 'Gallery Page';

        return view('admin.gallery.index', compact('galleries', 'title'));
    }

    // Tampilkan form tambah gambar
    public function create()
    {
        $kategoriList = ['Wisuda', 'Keluarga', 'Pasangan', 'Pertemanan', 'Lainnya'];

        return view('admin.gallery.create', [
            'title' => 'Buat Galeri',
            'kategoriList' => $kategoriList,
        ]);
    }

    // Simpan gambar baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'gambar' => 'required|array',
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:4096',
        ]);

        foreach ($request->file('gambar') as $file) {
            $path = $file->store('gallery', 'public');

            Gallery::create([
                'kategori' => $request->kategori,
                'gambar' => $path,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    // Tampilkan form edit gambar
    public function edit(Gallery $gallery)
    {
        $kategoriList = ['Wisuda', 'Keluarga', 'Pasangan', 'Pertemanan', 'Lainnya'];

        return view('admin.gallery.edit', [
            'title' => 'Edit Galeri',
            'gallery' => $gallery,
            'kategoriList' => $kategoriList,
        ]);
    }

    // Update data gambar
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'kategori' => 'required|string',
        ]);

        // Cek apakah ada gambar baru diupload
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            ]);

            // Hapus gambar lama
            if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
                Storage::disk('public')->delete($gallery->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('gallery', 'public');
            $gallery->gambar = $path;
        }

        $gallery->kategori = $request->kategori;
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil diperbarui!');
    }

    // Hapus gambar
    public function destroy(Gallery $gallery)
    {
        if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
            Storage::disk('public')->delete($gallery->gambar);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
