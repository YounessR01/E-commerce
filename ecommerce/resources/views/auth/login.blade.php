@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Connexion</h2>
                <p class="auth-subtitle">Bienvenue de retour ! Connectez-vous à votre compte.</p>
            </div>

            @if ($errors->any())
                <div class="auth-alert error">
                    <ul class="auth-error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="auth-form">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           class="form-input" placeholder="votre@email.com">
                    <svg class="form-icon" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>

                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" required 
                           class="form-input" placeholder="••••••••">
                    <svg class="form-icon" viewBox="0 0 24 24">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>

                <div class="form-options">
                    <label class="form-check">
                        <input type="checkbox" name="remember">
                        <span class="checkmark"></span>
                        Se souvenir de moi
                    </label>
                    <a href="{{ route('password.request') }}" class="form-link">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="auth-button primary">
                    <span>Se connecter</span>
                    <svg viewBox="0 0 24 24" width="20" height="20">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </form>

            <div class="auth-footer">
                <p>Pas encore de compte ? <a href="{{ route('register') }}" class="form-link">S'inscrire</a></p>
            </div>
        </div>
    </div>

    <style>
        /* Auth Container */
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
            padding: var(--space-lg);
            background-color: rgb(var(--color-bg));
        }

        .auth-card {
            background-color: rgb(var(--color-bg-elevated));
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 480px;
            padding: var(--space-2xl);
            border: 1px solid rgb(var(--color-border));
            transition: var(--transition-normal);
        }

        .auth-card:hover {
            box-shadow: var(--shadow-xl);
        }

        /* Auth Header */
        .auth-header {
            margin-bottom: var(--space-xl);
            text-align: center;
        }

        .auth-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: rgb(var(--color-text));
            margin-bottom: var(--space-sm);
        }

        .auth-subtitle {
            color: rgb(var(--color-text-muted));
            font-size: 0.9375rem;
        }

        /* Form Elements */
        .form-group {
            position: relative;
            margin-bottom: var(--space-lg);
        }

        .form-label {
            display: block;
            margin-bottom: var(--space-xs);
            font-weight: 500;
            color: rgb(var(--color-text));
            font-size: 0.9375rem;
        }

        .form-input {
            width: 100%;
            padding: var(--space-sm) var(--space-sm) var(--space-sm) var(--space-xl);
            border-radius: var(--radius-md);
            border: 1px solid rgb(var(--color-border));
            background-color: rgb(var(--color-bg));
            color: rgb(var(--color-text));
            font-family: 'Inter', sans-serif;
            transition: var(--transition-fast);
            font-size: 0.9375rem;
        }

        .form-input:focus {
            outline: none;
            border-color: rgb(var(--color-primary));
            box-shadow: 0 0 0 3px rgba(var(--color-primary), 0.1);
        }

        .form-input::placeholder {
            color: rgb(var(--color-text-muted));
            opacity: 0.6;
        }

        .form-icon {
            position: absolute;
            left: var(--space-sm);
            bottom: var(--space-sm);
            width: 18px;
            height: 18px;
            stroke: rgb(var(--color-text-muted));
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        /* Form Options */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-xl);
            font-size: 0.875rem;
        }

        .form-check {
            display: flex;
            align-items: center;
            cursor: pointer;
            color: rgb(var(--color-text-muted));
        }

        .form-check input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            display: inline-block;
            width: 16px;
            height: 16px;
            background-color: rgb(var(--color-bg));
            border: 1px solid rgb(var(--color-border));
            border-radius: var(--radius-sm);
            margin-right: var(--space-xs);
            position: relative;
            transition: var(--transition-fast);
        }

        .form-check input:checked ~ .checkmark {
            background-color: rgb(var(--color-primary));
            border-color: rgb(var(--color-primary));
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 5px;
            top: 2px;
            width: 4px;
            height: 8px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .form-check input:checked ~ .checkmark:after {
            display: block;
        }

        .form-link {
            color: rgb(var(--color-primary));
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .form-link:hover {
            text-decoration: underline;
        }

        /* Auth Button */
        .auth-button {
            width: 100%;
            padding: var(--space-md);
            border-radius: var(--radius-md);
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            transition: var(--transition-normal);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: var(--space-sm);
            border: none;
            cursor: pointer;
        }

        .auth-button svg {
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        .auth-button.primary {
            background-color: rgb(var(--color-primary));
            color: white;
        }

        .auth-button.primary:hover {
            background-color: rgb(var(--color-primary-hover));
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        .auth-button.primary:active {
            transform: translateY(0);
        }

        /* Auth Alert */
        .auth-alert {
            padding: var(--space-md);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-xl);
            font-size: 0.875rem;
        }

        .auth-alert.error {
            background-color: rgba(var(--color-error), 0.1);
            color: rgb(var(--color-error));
            border-left: 3px solid rgb(var(--color-error));
        }

        .auth-error-list {
            list-style: none;
            padding-left: 0;
        }

        .auth-error-list li {
            margin-bottom: var(--space-xs);
        }

        .auth-error-list li:last-child {
            margin-bottom: 0;
        }

        /* Auth Footer */
        .auth-footer {
            margin-top: var(--space-xl);
            text-align: center;
            font-size: 0.875rem;
            color: rgb(var(--color-text-muted));
        }

        /* Responsive */
        @media (max-width: 640px) {
            .auth-card {
                padding: var(--space-xl) var(--space-lg);
            }
        }
    </style>
@endsection