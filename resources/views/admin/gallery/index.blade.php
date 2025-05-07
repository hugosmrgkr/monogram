@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <div class="card-body" style="padding: 2rem;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 style="font-weight: 600; color: #212529; margin: 0;">Galeri</h4>
                    <a href="{{ route('admin.gallery.create') }}" class="btn" style="background-color: #212529; color: white; border-radius: 6px; padding: 8px 16px; font-size: 14px; font-weight: 500; border: none;">
                        <i class="fa fa-plus-circle me-2"></i>Tambah Gambar
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert" style="background-color: #edf7ed; color: #2e7d32; border-radius: 6px; padding: 12px 16px; margin-bottom: 20px; border-left: 4px solid #2e7d32;">
                        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive" style="margin-top: 10px;">
                    <table class="table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
                        <thead>
                            <tr style="background-color: #f8f9fa;">
                                <th style="padding: 16px; font-weight: 600; color: #212529; border-bottom: 1px solid #dee2e6; font-size: 14px;">Gambar</th>
                                <th style="padding: 16px; font-weight: 600; color: #212529; border-bottom: 1px solid #dee2e6; font-size: 14px;">Kategori</th>
                                <th style="padding: 16px; font-weight: 600; color: #212529; border-bottom: 1px solid #dee2e6; font-size: 14px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $gallery)
                                <tr style="transition: all 0.2s ease;">
                                    <td style="padding: 16px; border-bottom: 1px solid #dee2e6; vertical-align: middle;">
                                        <img src="{{ asset('storage/' . $gallery->gambar) }}" width="100" style="border-radius: 6px; object-fit: cover; height: 60px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    </td>
                                    <td style="padding: 16px; border-bottom: 1px solid #dee2e6; vertical-align: middle;">
                                        <span style="font-size: 14px; color: #212529; background-color: #f8f9fa; padding: 5px 10px; border-radius: 4px;">
                                            {{ $gallery->kategori }}
                                        </span>
                                    </td>
                                    <td style="padding: 16px; border-bottom: 1px solid #dee2e6; vertical-align: middle;">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.gallery.edit', ['gallery' => $gallery->galeri_id]) }}" class="btn" style="background-color: #f8f9fa; color: #212529; border-radius: 6px; padding: 6px 12px; font-size: 13px; border: 1px solid #dee2e6;">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.gallery.destroy', ['gallery' => $gallery->galeri_id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn" style="background-color: #fff; color: #dc3545; border-radius: 6px; padding: 6px 12px; font-size: 13px; border: 1px solid #dc3545;" onclick="return confirm('Yakin ingin menghapus?')">
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

                @if(count($galleries) == 0)
                <div class="text-center py-5" style="background-color: #f8f9fa; border-radius: 6px; margin-top: 20px;">
                    <i class="fa fa-image mb-3" style="font-size: 3rem; color: #adb5bd;"></i>
                    <p style="color: #6c757d; font-size: 15px;">Belum ada gambar dalam galeri</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hover effect pada baris tabel
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f8f9fa';
            });

            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    });
    </script>
@endsection
