@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <div class="card-body" style="padding: 2rem;">
                <h4 class="card-title" style="font-weight: 600; color: #212529;">Edit Gambar</h4>

                <form action="{{ route('admin.gallery.update', ['gallery' => $gallery->galeri_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="kategori" style="font-size: 14px; color: #212529;">Pilih Galeri</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="Wisuda" {{ $gallery->kategori == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
                            <option value="Keluarga" {{ $gallery->kategori == 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                            <option value="Pasangan" {{ $gallery->kategori == 'Pasangan' ? 'selected' : '' }}>Pasangan</option>
                            <option value="Pertemanan" {{ $gallery->kategori == 'Pertemanan' ? 'selected' : '' }}>Pertemanan</option>
                            <option value="Lainnya" {{ $gallery->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>  <!-- Menambahkan opsi Lainnya -->
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="font-size: 14px; color: #212529;">Gambar Lama</label><br>
                        <img src="{{ asset('storage/app/public/' . $gallery->gambar) }}" width="100" style="border-radius: 6px; object-fit: cover;">
                    </div>

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="gambar" style="font-size: 14px; color: #212529;">Ganti Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" style="padding: 0.5rem;">
                    </div>

                    <button type="submit" class="btn" style="background-color: #212529; color: white; border-radius: 6px; padding: 8px 16px; font-size: 14px; font-weight: 500; border: none;">
                        Simpan
                    </button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn" style="background-color: #fff; color: #212529; border: 1px solid #212529; border-radius: 6px; padding: 8px 16px; font-size: 14px; font-weight: 500;">
                        Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
