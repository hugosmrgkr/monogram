@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Edit Layanan</h2>

                <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="judul">Judul Layanan</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $layanan->judul }}" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $layanan->keterangan }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Layanan</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        @if($layanan->gambar)
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" width="100">
                        @endif
                    </div>

                     <button type="submit" class="btn" style="background-color: black; color: white; border: none;">Simpan</button>
                    <a href="{{ route('admin.layanan.index') }}" class="btn" style="background-color: white; color: black; border: 1px solid black;">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
