<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::all();
        return view('admin.pages.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.pages.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048' // Gambar wajib
        ]);

        $gambarPath = $request->file('gambar')->store('layanan', 'public');

        Layanan::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'gambar' => $gambarPath
        ]);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.pages.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Gambar opsional saat update
        ]);

        $data = $request->only(['judul', 'keterangan']);

        if ($request->hasFile('gambar')) {
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
