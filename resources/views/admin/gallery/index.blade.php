@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Galeri</h4>
                <a href="{{ route('gallery.create') }}" class="btn btn-success mb-3">Tambah Gambar</a>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td><img src="{{ asset('uploads/' . $gallery->gambar) }}" width="100"></td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
