<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chirper</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Helvetica+Neue:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f8fa;
            color: #14171a;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: space-between;
            padding: 0 10%;
        }

        .left-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .left-section img {
            max-width: 80%;
        }

        .right-section {
            flex: 1;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #1da1f2;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            color: white;
            background-color: #1da1f2;
            border: none;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            margin: 10px 0;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0d8de1;
        }

        .text-center {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #1da1f2;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Left Section -->
    <div class="left-section">
        <img src="https://abs.twimg.com/responsive-web/client-web/icon-ios.8ea219d8.png" alt="Twitter Icon">
        <h1>Acompanhe o que está acontecendo no mundo agora.</h1>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="logo">Chirper</div>

        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn">Ir para o Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn">Criar conta</a>
                    @endif
                @endauth
            </nav>
        @endif

        <div class="text-center">
            <p>Já tem uma conta? <a href="{{ route('login') }}">Entre agora</a>.</p>
            <p>Ou <a href="{{ route('register') }}">crie uma nova conta</a>.</p>
        </div>
    </div>
</div>
</body>
</html>
