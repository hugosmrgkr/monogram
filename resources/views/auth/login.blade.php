<!DOCTYPE html>
<html lang="id">

<head>
    <title>Login - Monogram Toba</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="background: url('/assets/images/background.jpg') no-repeat center center/cover;">
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div>
            <h1>MONOGRAM TOBA</h1>
            <p>Welcome to website Monogram Studio Balige</p>

            @if ($errors->any())
                <p style="color: red;">{{ $errors->first('error') }}</p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" required>

                <button type="submit">Login Sebagai Admin</button>
            </form>

            <form action="{{ route('home') }}" method="GET">
                <button type="submit">Masuk Sebagai Tamu</button>
            </form>
        </div>
    </div>
</body>

</html>
