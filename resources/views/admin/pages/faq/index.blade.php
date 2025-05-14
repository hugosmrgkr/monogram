@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h2 class="text-center text-dark font-weight-bold mb-4" style="letter-spacing: -0.5px;">{{ $title }}</h2>

                {{-- Tombol Tambah FAQ --}}
                <div class="text-end mb-3">
                    <a href="{{ route('admin.faq.create') }}" class="btn btn-dark btn-sm">
                        <i class="fa fa-plus-circle me-2"></i>Tambah FAQ
                    </a>
                </div>
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success text-center mb-3" role="alert">
                        {{ session('success') }}
                    </div>
                    <script>
                        // Menyembunyikan alert setelah 3 detik
                        setTimeout(function() {
                            var successAlert = document.getElementById('success-alert');
                            if (successAlert) {
                                successAlert.style.display = 'none';
                            }
                        }, 3000); // 3000ms = 3 detik
                    </script>
                @endif

                @if ($faqs->isEmpty())
                    <div class="alert alert-info text-center mb-3" role="alert">
                        <p class="mb-0">Belum ada data FAQ.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">No</th>
                                    <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">Pertanyaan</th>
                                    <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">Jawaban</th>
                                    <th class="text-uppercase text-white" style="font-size: 14px; letter-spacing: 1px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $faq)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $faq->pertanyaan }}</td>
                                        <td>{{ Str::limit($faq->jawaban, 50) }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-outline-dark btn-sm">
                                                    <i class="fa fa-edit me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus FAQ ini?')">
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

@section('script')
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
        document.querySelectorAll('.btn-outline-dark').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#000000';
                this.style.color = '#ffffff';
            });

            button.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
                this.style.color = '#000000';
            });
        });

        document.querySelectorAll('.btn-outline-danger').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#dc3545';
                this.style.color = '#ffffff';
            });

            button.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
                this.style.color = '#dc3545';
            });
        });
    });
</script>
@endsection
