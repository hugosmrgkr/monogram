<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.pages.layanan.index', [
            'layanans' =>  Layanan::all(),
            'title' => 'Daftar Layanan'
        ]);
    }

    public function create()
    {
        return view('admin.pages.layanan.create',[
            'title' => 'Buat Daftar Layanan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,JPG,png,jpg|max:2048' // Gambar wajib
        ]);

        $gambarPath = $request->file('gambar')->store('layanan', 'public');

        Layanan::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'gambar' => $gambarPath,
            'admin_id' => Auth::id()
        ]);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.pages.layanan.edit', [
            'layanan' => $layanan,
            'title' => 'Edit data layanan'
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,JPG,png,jpg|max:2048' // Gambar opsional saat update
        ]);

        $data = $request->only(['judul', 'keterangan']);

        if ($request->hasFile('gambar')) {
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }
        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
