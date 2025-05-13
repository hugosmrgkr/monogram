<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentangkami = TentangKami::all();
        $title = "Halaman Tentang Kami";

        return view('admin.pages.tentang_kami.index', compact('tentangkami', 'title'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah data tentang kami
        return view('admin.pages.tentang_kami.create', [
            'title' => 'Tambah Data Tentang Kami'
        ]);
    }

public function store(Request $request)
{
    $request->validate([
        'jam_buka_hari_biasa' => 'required',
        'jam_tutup_hari_biasa' => 'required',
        'jam_buka_akhir_pekan' => 'required',
        'jam_tutup_akhir_pekan' => 'required',
        'kontak_wa' => 'required|url',
        'kontak_ig' => 'required|url',
    ]);

    TentangKami::create([
        'jam_buka_hari_biasa' => $request->jam_buka_hari_biasa,
        'jam_tutup_hari_biasa' => $request->jam_tutup_hari_biasa,
        'jam_buka_akhir_pekan' => $request->jam_buka_akhir_pekan,
        'jam_tutup_akhir_pekan' => $request->jam_tutup_akhir_pekan,
        'kontak_wa' => $request->kontak_wa,
        'kontak_ig' => $request->kontak_ig,
        'admin_id' => Auth::id(),
    ]);

    return redirect()->route('admin.tentang-kami.index')->with('success', 'Data Tentang Kami berhasil ditambahkan!');
}


    public function edit(TentangKami $tentangKami)
    {
        // Menampilkan form untuk mengedit data tentang kami
        return view('admin.pages.tentang_kami.edit', [
            'tentangKami' => $tentangKami,
            'title' => 'Edit Data Tentang Kami'
        ]);
    }

    public function update(Request $request, TentangKami $tentangKami)
    {
        // Validasi input
        $request->validate([
            'jam_buka_hari_biasa' => 'required',
            'jam_tutup_hari_biasa' => 'required',
            'jam_buka_akhir_pekan' => 'required',
            'jam_tutup_akhir_pekan' => 'required',
            'kontak_wa' => 'required|url',
            'kontak_ig' => 'required|url',
        ]);
        $tentangKami->update([
            'jam_buka_hari_biasa' => $request->jam_buka_hari_biasa,
            'jam_tutup_hari_biasa' => $request->jam_tutup_hari_biasa,
            'jam_buka_akhir_pekan' => $request->jam_buka_akhir_pekan,
            'jam_tutup_akhir_pekan' => $request->jam_tutup_akhir_pekan,
            'kontak_wa' => $request->kontak_wa,
            'kontak_ig' => $request->kontak_ig,
        ]);
        return redirect()->route('admin.tentang-kami.index')->with('success', 'Data Tentang Kami berhasil diperbarui!');
    }

    public function destroy(TentangKami $tentangKami)
    {
        $tentangKami->delete();
        return redirect()->route('admin.tentang-kami.index')->with('success', 'Data Tentang Kami berhasil dihapus!');
    }
}
