<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{

    // Untuk user lihat galeri
    public function userView()
    {
        $wisuda = Gallery::where('kategori', 'Wisuda')->get();
        $keluarga = Gallery::where('kategori', 'Keluarga')->get();
        $pasangan = Gallery::where('kategori', 'Pasangan')->get();
        $pertemanan = Gallery::where('kategori', 'Pertemanan')->get();

        return view('user.gallery', compact('wisuda', 'keluarga', 'pasangan', 'pertemanan'));
    }

    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //Upload File Gambar
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('uploads'), $imageName);

        Gallery::create([
            'kategori' => $request->kategori,
            'gambar' => $imageName,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'kategori' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Hapus gambar lama
            Storage::delete('uploads/' . $gallery->gambar);

            // Simpan gambar baru
            $gambarName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $gambarName);
            $gallery->gambar = $gambarName;
        }

        $gallery->kategori = $request->kategori;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete('uploads/' . $gallery->gambar);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
