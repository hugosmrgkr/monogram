@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border: none; border-radius: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.08); background-color: #ffffff;">
            <div class="card-body" style="padding: 2.5rem;">
                <h2 style="font-weight: 700; color: #000000; margin-bottom: 2rem; text-align: center; letter-spacing: -0.5px;">Layanan</h2>

                {{-- Tombol Tambah --}}
                <div style="margin-bottom: 1.5rem; text-align: right;">
                    <a href="{{ route('admin.layanan.create') }}" class="btn" style="background-color: #000000; color: #ffffff; border-radius: 0; padding: 8px 20px; font-size: 14px; letter-spacing: 0.5px; font-weight: 500; border: 1px solid #000000; transition: all 0.3s ease;">
                        <i class="fa fa-plus-circle me-2"></i>Tambah Layanan
                    </a>
                </div>

                @if ($layanans->isEmpty())
                    <div style="background-color: #f8f9fa; border-radius: 0; padding: 20px; text-align: center; border-left: 3px solid #000000; margin-bottom: 20px;">
                        <p style="color: #000000; font-size: 15px; margin: 0;">Belum ada data layanan.</p>
                    </div>
                @else
                    <div class="table-responsive" style="margin-top: 10px;">
                        <table class="table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
                            <thead>
                                <tr style="background-color: #000000;">
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">No</th>
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Judul</th>
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Gambar</th>
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Keterangan</th>
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layanans as $key => $layanan)
                                    <tr style="transition: all 0.2s ease; border-bottom: 1px solid #f0f0f0;">
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <span style="font-size: 14px; color: #000000; font-weight: 500;">{{ $key + 1 }}</span>
                                        </td>
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <span style="font-size: 14px; color: #333333;">{{ $layanan->judul }}</span>
                                        </td>
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            @if ($layanan->gambar)
                                                <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="Gambar" width="100" style="border-radius: 0; object-fit: cover;">
                                            @else
                                                <span style="font-size: 14px; color: #999999;">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <span style="font-size: 14px; color: #333333;">{{ Str::limit($layanan->keterangan, 50) }}</span>
                                        </td>
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-edit" style="background-color: #ffffff; color: #000000; border: 1px solid #000000; border-radius: 0; padding: 6px 12px; font-size: 13px; margin-right: 8px; transition: all 0.3s ease;">
                                                    <i class="fa fa-edit me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete" style="background-color: #000000; color: #ffffff; border: 1px solid #000000; border-radius: 0; padding: 6px 12px; font-size: 13px; transition: all 0.3s ease;" onclick="return confirm('Yakin ingin menghapus layanan ini?')">
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
        
        // Hover effects untuk tombol
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#000000';
                this.style.color = '#ffffff';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '#ffffff';
                this.style.color = '#000000';
            });
        });
        
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#ffffff';
                this.style.color = '#000000';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '#000000';
                this.style.color = '#ffffff';
            });
        });
        
        // Add hover effect for images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('mouseenter', function() {
                this.style.opacity = '0.8';
            });
            
            img.addEventListener('mouseleave', function() {
                this.style.opacity = '1';
            });
        });
    });
    </script>
@endsection