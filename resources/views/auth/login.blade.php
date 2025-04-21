@extends('layouts.auth')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="login-section">
  <div class="container-login">
    <div class="login-card" data-aos="fade-up" data-aos-duration="1000">

      {{-- Tombol Close --}}
      <a href="{{ route('home') }}" class="btn-close-custom" aria-label="Close">×</a>

      {{-- Form --}}
      <div class="login-form">
        <div class="logo-container">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Monogram Logo">
          <h4 class="title">Monogram Admin Login</h4>
        </div>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="input-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>

          <div class="actions">
            <button type="submit" class="btn-login">Login</button>
          </div>
        </form>
      </div>

      {{-- Info Panel --}}
      <div class="login-info d-none d-lg-flex">
        <div class="info-text" data-aos="fade-left" data-aos-duration="1000">
          <h4>Selamat Datang</h4>
          <p>Masuk ke sistem untuk mengelola layanan Monogram Studio dengan aman dan profesional.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
@endsection
