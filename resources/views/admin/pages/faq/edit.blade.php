@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Edit FAQ</h2>

                <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menggunakan method PUT untuk update -->

                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ old('pertanyaan', $faq->pertanyaan) }}" required>
                        @error('pertanyaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <textarea name="jawaban" id="jawaban" class="form-control @error('jawaban') is-invalid @enderror" required>{{ old('jawaban', $faq->jawaban) }}</textarea>
                        @error('jawaban')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group text-right">
                        <a href="{{ route('faq.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
