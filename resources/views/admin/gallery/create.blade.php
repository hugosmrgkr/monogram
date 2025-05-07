@extends('admin.layouts.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Gambar</h4>

            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="kategori">Pilih Galeri</label>
                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Galeri --</option>
                        <option value="Wisuda">Wisuda</option>
                        <option value="Keluarga">Keluarga</option>
                        <option value="Pasangan">Pasangan</option>
                        <option value="Pertemanan">Pertemanan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    @error('kategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar[]" class="form-control @error('gambar') is-invalid @enderror" multiple>
                    @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('gambar.*')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">Simpan</button>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-dark">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
