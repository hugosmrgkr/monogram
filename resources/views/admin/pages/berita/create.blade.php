@extends('admin.layouts.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Tambah Berita</h2>
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="5" required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Gambar (Opsional)</label>
                    <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Habis</label>
                    <input type="date" name="tanggal_habis" class="form-control @error('tanggal_habis') is-invalid @enderror" value="{{ old('tanggal_habis') }}" required>
                    @error('tanggal_habis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn" style="background-color: black; color: white; border: none;">Simpan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn" style="background-color: white; color: black; border: 1px solid black;">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
