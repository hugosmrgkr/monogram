@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Gambar</h4>

                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Pilih Galeri</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">-- Pilih Galeri --</option>
                            <option value="Wisuda">Wisuda</option>
                            <option value="Keluarga">Keluarga</option>
                            <option value="Pasangan">Pasangan</option>
                            <option value="Pertemanan">Pertemanan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
