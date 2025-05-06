@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card" style="border: none; border-radius: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.08); background-color: #ffffff;">
            <div class="card-body" style="padding: 2.5rem;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 style="font-weight: 700; color: #000000; margin: 0; letter-spacing: -0.5px;">Daftar Komentar</h4>
                </div>

                @if(session('success'))
                    <div class="alert" style="background-color: #f8f9fa; color: #000000; border-radius: 0; padding: 14px 18px; margin-bottom: 24px; border-left: 3px solid #28a745;">
                        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert" style="background-color: #f8f9fa; color: #000000; border-radius: 0; padding: 14px 18px; margin-bottom: 24px; border-left: 3px solid #dc3545;">
                        <i class="fa fa-times-circle me-2"></i>{{ session('error') }}
                    </div>
                @endif

                <div class="table-responsive" style="margin-top: 10px;">
                    <table class="table" style="width: 100%; border-collapse: separate; border-spacing: 0;">
                        <thead>
                            <tr style="background-color: #000000;">
                                <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Nama</th>
                                <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Ulasan</th>
                                <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Status</th>
                                <th style="padding: 16px; font-weight: 600; color: #ffffff; border: none; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ulasans as $ulasan)
                                <tr class="table-row" style="transition: all 0.3s ease; border-bottom: 1px solid #f0f0f0;">
                                    <td style="padding: 18px 16px; vertical-align: middle;">
                                        <span style="font-size: 14px; color: #000000; font-weight: 500;">{{ $ulasan->name ?? 'Anonim' }}</span>
                                    </td>
                                    <td style="padding: 18px 16px; vertical-align: middle;">
                                        <span style="font-size: 14px; color: #333333;">{{ $ulasan->ulasan }}</span>
                                    </td>
                                    <td style="padding: 18px 16px; vertical-align: middle;">
                                        <span style="font-size: 13px; color: #ffffff; background-color: {{ $ulasan->is_approved ? '#28a745' : '#dc3545' }}; padding: 5px 12px; border-radius: 0; letter-spacing: 0.5px; font-weight: 500;">
                                            {{ $ulasan->is_approved ? 'Tampil' : 'Disembunyikan' }}
                                        </span>
                                    </td>
                                    <td style="padding: 18px 16px; vertical-align: middle;">
                                        <form action="{{ route('admin.ulasan.toggle', $ulasan->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn" style="{{ $ulasan->is_approved ? 'background-color: #ffffff; color: #000000; border: 1px solid #000000;' : 'background-color: #000000; color: #ffffff; border: 1px solid #000000;' }} border-radius: 0; padding: 8px 16px; font-size: 13px; letter-spacing: 0.5px; font-weight: 500; transition: all 0.3s ease;">
                                                <i class="fa {{ $ulasan->is_approved ? 'fa-eye-slash' : 'fa-eye' }} me-1"></i>
                                                {{ $ulasan->is_approved ? 'Sembunyikan' : 'Tampilkan' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center py-5" style="background-color: #f8f9fa; border-radius: 0; margin-top: 20px; border: 1px solid #f0f0f0;">
                                            <i class="fa fa-comments mb-3" style="font-size: 3rem; color: #000000; opacity: 0.2;"></i>
                                            <p style="color: #000000; font-size: 15px; font-weight: 500;">Tidak ada ulasan yang masuk.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hover effect pada baris tabel
        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f8f9fa';
            });

            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });

            // Button hover effects
            const buttons = row.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    if (this.style.backgroundColor === 'rgb(255, 255, 255)') {
                        this.style.backgroundColor = '#000000';
                        this.style.color = '#ffffff';
                    } else {
                        this.style.backgroundColor = '#ffffff';
                        this.style.color = '#000000';
                    }
                });

                button.addEventListener('mouseleave', function() {
                    if (this.textContent.includes('Sembunyikan')) {
                        this.style.backgroundColor = '#ffffff';
                        this.style.color = '#000000';
                    } else {
                        this.style.backgroundColor = '#000000';
                        this.style.color = '#ffffff';
                    }
                });
            });
        });
    });
    </script>
@endsection
