@extends('admin.layouts.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data About</h4>

                <form class="forms-sample" action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Masukkan deskripsi"></textarea>
                    </div>

                    {{-- Gambar Utama --}}
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                    {{-- Paragraf Penutup --}}
                    <div class="form-group">
                        <label for="closing_paragraph">Paragraf Penutup</label>
                        <textarea class="form-control" name="closing_paragraph" rows="3" placeholder="Masukkan paragraf penutup"></textarea>
                    </div>

{{-- Jam Operasional --}}

{{-- Jam Operasional (Senin - Sabtu) --}}
<div class="form-group">
    <label for="weekday_open">Jam Buka (Senin - Sabtu)</label>
    <input type="time" class="form-control" name="weekday_open" required>
</div>
<div class="form-group">
    <label for="weekday_close">Jam Tutup (Senin - Sabtu)</label>
    <input type="time" class="form-control" name="weekday_close" required>
</div>

{{-- Jam Operasional (Minggu) --}}
<div class="form-group">
    <label for="weekend_open">Jam Buka (Minggu)</label>
    <input type="time" class="form-control" name="weekend_open" required>
</div>
<div class="form-group">
    <label for="weekend_close">Jam Tutup (Minggu)</label>
    <input type="time" class="form-control" name="weekend_close" required>
</div>


                    {{-- Gambar Horizontal (2 Foto) --}}
                    <div class="form-group">
                        <label for="horizontal_images">Gambar Horizontal (2 Foto)</label>
                        <input type="file" class="form-control" name="horizontal_images[]" multiple>
                    </div>

                    {{-- Galeri (3 Foto) --}}
                    <div class="form-group">
                        <label for="gallery_images">Galeri (3 Foto)</label>
                        <input type="file" class="form-control" name="gallery_images[]" multiple>
                    </div>

                    {{-- Tombol --}}
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ route('about.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
