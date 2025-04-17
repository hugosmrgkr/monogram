@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">{{ $title }}</h2>

                {{-- Tombol Tambah FAQ --}}
                <div class="mb-3 text-right">
                    <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">Tambah FAQ</a>
                </div>

                @if ($faqs->isEmpty())
                    <div class="alert alert-warning text-center">
                        Belum ada data FAQ.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $faq)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $faq->pertanyaan }}</td>
                                        <td>{{ Str::limit($faq->jawaban, 50) }}</td>
                                        <td>
                                            <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus FAQ ini?')">Hapus</button>
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
