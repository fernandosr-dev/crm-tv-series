@extends('layouts.main')

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('auth.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')

    <div>
        <style>
            /* Centralizando a tela */
            .login-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh; /* A altura será 100% da tela */
            }

            /* Caixa do formulário */
            .login-box {
                background-color: white;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px; /* Largura fixa para a caixa */
                box-sizing: border-box; /* Ajuste de largura para o padding */
            }

            .login-box h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            .form-control {
                margin-bottom: 15px;
            }

            .btn-primary {
                width: 100%;
                padding: 10px;
                font-size: 16px;
            }
        </style>

    </div>

@endsection
