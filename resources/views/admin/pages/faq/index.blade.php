@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border: none; border-radius: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.08); background-color: #ffffff;">
            <div class="card-body" style="padding: 2.5rem;">
                <h2 style="font-weight: 700; color: #000000; margin-bottom: 2rem; text-align: center; letter-spacing: -0.5px;">{{ $title }}</h2>

                {{-- Tombol Tambah FAQ --}}
                <div style="margin-bottom: 1.5rem; text-align: right;">
                    <a href="{{ route('admin.faq.create') }}" class="btn" style="background-color: #000000; color: #ffffff; border-radius: 0; padding: 8px 20px; font-size: 14px; letter-spacing: 0.5px; font-weight: 500; border: 1px solid #000000; transition: all 0.3s ease;">
                        <i class="fa fa-plus-circle me-2"></i>Tambah FAQ
                    </a>
                </div>

                @if ($faqs->isEmpty())
                    <div style="background-color: #f8f9fa; border-radius: 0; padding: 20px; text-align: center; border-left: 3px solid #000000; margin-bottom: 20px;">
                        <p style="color: #000000; font-size: 15px; margin: 0;">Belum ada data FAQ.</p>
                    </div>
                @else
                    <div class="table-responsive" style="margin-top: 10px;">
                        <table class="table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
                            <thead>
                                <tr style="background-color: #000000;">
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">No</th>
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Pertanyaan</th>
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Jawaban</th>
                                    <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $faq)
                                    <tr style="transition: all 0.2s ease; border-bottom: 1px solid #f0f0f0;">
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <span style="font-size: 14px; color: #000000; font-weight: 500;">{{ $key + 1 }}</span>
                                        </td>
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <span style="font-size: 14px; color: #333333;">{{ $faq->pertanyaan }}</span>
                                        </td>
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <span style="font-size: 14px; color: #333333;">{{ Str::limit($faq->jawaban, 50) }}</span>
                                        </td>
                                        <td style="padding: 18px 16px; vertical-align: middle;">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-edit" style="background-color: #ffffff; color: #000000; border: 1px solid #000000; border-radius: 0; padding: 6px 12px; font-size: 13px; margin-right: 8px; transition: all 0.3s ease;">
                                                    <i class="fa fa-edit me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete" style="background-color: #000000; color: #ffffff; border: 1px solid #000000; border-radius: 0; padding: 6px 12px; font-size: 13px; transition: all 0.3s ease;" onclick="return confirm('Yakin ingin menghapus FAQ ini?')">
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
    });
    </script>
@endsection