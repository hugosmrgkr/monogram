@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Gambar</h4>

                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Pilih Galeri</label>
                        <select name="kategori" class="form-control" value="{{ $gallery->kategori }}" required>
                            <option value="">{{ $gallery->kategori }}</option>
                            <option value="Wisuda">Wisuda</option>
                            <option value="Keluarga">Keluarga</option>
                            <option value="Pasangan">Pasangan</option>
                            <option value="Pertemanan">Pertemanan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar Lama</label><br>
                        <img src="{{ asset('uploads/' . $gallery->gambar) }}" width="100">
                    </div>
                    <div class="form-group">
                        <label>Ganti Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
