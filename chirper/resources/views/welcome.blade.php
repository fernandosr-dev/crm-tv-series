
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chirper</title>

    <!-- Vite Styles -->
    @vite(['resources/css/styles.css'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Helvetica+Neue:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<body>
<div class="container">
    <!-- Left Section -->
    <div class="left-section">
        <img src="{{ asset('images/chirper-logo.png') }}" alt="Chirper Logo" class="logo">
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
