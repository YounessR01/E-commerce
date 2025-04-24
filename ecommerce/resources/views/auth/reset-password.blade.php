@extends('layouts.app')

@section('title', 'Mot de passe oublié')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Mot de passe oublié</h2>
                <p class="auth-subtitle">Entrez votre email pour recevoir un lien de réinitialisation</p>
            </div>

            @if (session('status'))
                <div class="auth-alert success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="auth-alert error">
                    <ul class="auth-error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="auth-form">
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

                <button type="submit" class="auth-button primary">
                    <span>Envoyer le lien de réinitialisation</span>
                    <svg viewBox="0 0 24 24" width="20" height="20">
                        <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                    </svg>
                </button>
            </form>

            <div class="auth-footer">
                <p>Retour à la <a href="{{ route('login') }}" class="form-link">connexion</a></p>
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
            margin-bottom: var(--space-xl);
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

        /* Auth Alerts */
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

        .auth-alert.success {
            background-color: rgba(var(--color-success), 0.1);
            color: rgb(var(--color-success));
            border-left: 3px solid rgb(var(--color-success));
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

        /* Form Link */
        .form-link {
            color: rgb(var(--color-primary));
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .form-link:hover {
            text-decoration: underline;
        }

        /* Modern CSS 2025 Features */
        @media (prefers-color-scheme: dark) {
            .auth-card {
                background-color: oklch(15% 0.03 150);
                border-color: oklch(20% 0.05 150);
            }
            
            .form-input {
                background-color: oklch(10% 0.01 150);
                border-color: oklch(20% 0.05 150);
            }
        }

        @media (prefers-reduced-motion) {
            .auth-card,
            .auth-button,
            .form-input {
                transition: none;
            }
            
            .auth-button.primary:hover {
                transform: none;
            }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .auth-card {
                padding: var(--space-xl) var(--space-lg);
            }
            
            .auth-title {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection