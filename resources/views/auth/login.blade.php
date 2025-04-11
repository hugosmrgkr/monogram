@extends('layouts.auth')

@section('content')
<div class="auth-container container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="auth-wrapper col-md-5 position-relative">
        <div class="auth-card card border-0 shadow-sm">

            {{-- Tombol X --}}
            <div class="auth-close position-absolute top-0 end-0 m-3">
                <a href="{{ url('/') }}" class="btn-close" aria-label="Close"></a>
            </div>

            {{-- Header --}}
            <div class="auth-header card-header bg-dark text-white text-center py-3">
                <h4 class="mb-0 fw-bold">Login Admin Monogram Studio</h4>
            </div>

            {{-- Body --}}
            <div class="auth-body card-body px-4">

                {{-- Error Session --}}
                @if(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Error Validasi --}}
                @if($errors->has('error'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="auth-form-group form-floating mb-3">
                        <input type="email" id="email" name="username"
                            class="form-control @error('username') is-invalid @enderror"
                            placeholder="name@example.com" value="{{ old('username') }}" required autofocus>
                        <label for="email">Alamat Email</label>
                        @error('username')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="auth-form-group form-floating mb-4">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Kata Sandi" required>
                        <label for="password">Kata Sandi</label>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Tombol Login --}}
                    <div class="auth-button d-grid">
                        <button type="submit" class="btn btn-dark btn-lg rounded-pill shadow-sm">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
