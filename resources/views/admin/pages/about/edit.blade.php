@extends('admin.layouts.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>

                <form class="forms-sample" method="POST" action="{{ route('admin.about.update', $about->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $about->description) }}</textarea>
                    </div>

                    {{-- Gambar utama --}}
                    <div class="form-group">
                        <label>Gambar Saat Ini</label><br>
                        @if ($about->image)
                            <img src="{{ asset('storage/' . $about->image) }}" alt="Gambar" width="120">
                        @else
                            <p class="text-muted">Tidak ada gambar</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Upload Gambar Baru</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    {{-- Paragraf Penutup --}}
                    <div class="form-group">
                        <label>Paragraf Penutup</label>
                        <textarea name="closing_paragraph" class="form-control" rows="3">{{ old('closing_paragraph', $about->closing_paragraph) }}</textarea>
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

                    {{-- Gambar Horizontal --}}
                    <div class="form-group">
                        <label>Gambar Horizontal Saat Ini</label><br>
                        @if ($about->horizontal_images)
                            @foreach (json_decode($about->horizontal_images, true) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Horizontal" width="120" class="mr-2 mb-2">
                            @endforeach
                        @else
                            <p class="text-muted">Belum ada gambar horizontal</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Upload Gambar Horizontal Baru (2 Foto)</label>
                        <input type="file" name="horizontal_images[]" class="form-control" multiple>
                    </div>

                    {{-- Galeri --}}
                    <div class="form-group">
                        <label>Galeri Saat Ini</label><br>
                        @if ($about->gallery_images)
                            @foreach (json_decode($about->gallery_images, true) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Galeri" width="120" class="mr-2 mb-2">
                            @endforeach
                        @else
                            <p class="text-muted">Belum ada galeri</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Upload Galeri Baru (3 Foto)</label>
                        <input type="file" name="gallery_images[]" class="form-control" multiple>
                    </div>

                    {{-- Tombol --}}
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
