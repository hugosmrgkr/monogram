<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogram Toba</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        /* Body Styling */
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            background-color: #e6e6e6;
        }

        /* Container utama */
        .container {
            width: 100%;
            max-width: 100%;
            padding: 20px;
            text-align: center; /* Semua elemen rata tengah */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 70px; /* Margin atas untuk posisi vertikal */
        }

        /* Judul utama */
        .title {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
            text-align: center; /* Judul rata tengah */
        }

        /* Subjudul */
        .subtitle {
            font-size: 16px;
            color: black;
            margin-bottom: 20px;
            text-align: center; /* Subtitle rata tengah */
        }

        /* Tombol */
        .button {
            display: inline-block;
            padding: 8px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px; /* Tombol memiliki sudut bulat */
        }

        /* Hover Tombol */
        .button:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">MONOGRAM TOBA</h1>
        <p class="subtitle">Welcome to website Monogram Studio Balige</p>
        <a href="{{ route('login') }}" class="button">Masuk</a>
    </div>
</body>

</html>
