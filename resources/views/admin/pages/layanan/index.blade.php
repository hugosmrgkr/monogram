@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body py-4">
                <h2 class="text-center font-weight-bold mb-4 text-dark">Layanan</h2>

                {{-- Tombol Tambah --}}
                <div class="mb-3 text-end">
                    <a href="{{ route('admin.layanan.create') }}" class="btn btn-dark btn-sm">
                        <i class="fa fa-plus-circle me-2"></i>Tambah Layanan
                    </a>
                </div>

                @if ($layanans->isEmpty())
                    <div class="alert alert-info text-center">
                        Belum ada data layanan.
                    </div>
                @else
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark text-center">
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
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $layanan->judul }}</td>
                                        <td>
                                            @if ($layanan->gambar)
                                                <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="Gambar" style="width: 180px; height: 120px; object-fit: cover; border-radius: 8px;">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($layanan->keterangan, 50) }}</td>
                                        <td class="text-center">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-outline-dark btn-sm">
                                                    <i class="fa fa-edit me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-dark btn-sm">
                                                        <i class="fa fa-trash me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
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
