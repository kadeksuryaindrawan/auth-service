<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Sistem Rekomendasi Program Bantuan</h1>
        <p>Silakan login atau register untuk melanjutkan.</p>
        <a href="{{ route('login') }}" class="btn">Login</a>
        <a href="{{ route('register') }}" class="btn">Register</a>
    </div>
</body>
</html>
