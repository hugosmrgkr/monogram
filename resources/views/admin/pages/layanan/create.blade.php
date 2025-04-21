@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Tambah Layanan</h2>

                <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Layanan</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Layanan</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.layanan.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
