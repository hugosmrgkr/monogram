@extends('admin.layouts.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>

                <form class="forms-sample" method="POST" action="{{ route('about.update', $about->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $about->description) }}</textarea>
                    </div>

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

                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('about.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
