@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Layanan</h2>

                {{-- Tombol Tambah --}}
                <div class="mb-3 text-right">
                    <a href="{{ route('layanan.create') }}" class="btn btn-primary">Tambah Layanan</a>
                </div>

                @if ($layanans->isEmpty())
                    <div class="alert alert-warning text-center">
                        Belum ada data layanan.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layanans as $key => $layanan)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $layanan->judul }}</td>
                                        <td>
                                            @if ($layanan->gambar)
                                                <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="Gambar" width="100">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($layanan->keterangan, 50) }}</td>
                                        <td>
                                            <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus layanan ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
