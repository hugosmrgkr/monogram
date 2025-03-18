<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogram Toba</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        
        .container {
            width: 100%;
            height: 100vh;
            background-color: white;
            background-image: url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .header {
            position: absolute;
            top: 70px;
            width: 100%;
            text-align: center;
        }
        
        .title {
            font-size: 40px;
            font-weight: 700;
            color: black;
        }
        
        .subtitle {
            font-size: 16px;
            color: black;
            margin-top: 5px;
        }
        
        .button-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        
        .button {
            padding: 10px 30px;
            background-color: black;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1 class="title">MONOGRAM TOBA</h1>
        <p class="subtitle">Welcome to website Monogram Studio Balige</p>

        <div class="button-container">
            <a href="{{ route('login') }}" class="button">Masuk</a>
        </div>
    </div>
</div>

</body>
</html>