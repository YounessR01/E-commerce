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
        /* Reset body margin and padding */
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f4f6; /* Light gray background for the page */
        }

        /* Auth Container */
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Changed to 100vh to fill the viewport */
            padding: 2rem;
            background-color: #f3f4f6; /* Light gray background */
        }

        .auth-card {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 480px;
            padding: 2.5rem;
            border: 1px solid #e5e7eb; /* Light gray border */
        }

        /* Auth Header */
        .auth-header {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .auth-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937; /* Dark gray text */
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            color: #6b7280; /* Medium gray */
            font-size: 0.9375rem;
        }

        /* Form Elements */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: 500;
            color: #1f2937;
            font-size: 0.9375rem;
        }

        .form-input {
            width: 100%;
            padding: 0.5rem 0.5rem 0.5rem 2rem;
            border-radius: 0.375rem;
            border: 1px solid #e5e7eb;
            background-color: white;
            color: #1f2937;
            font-family: 'Inter', sans-serif;
            font-size: 0.9375rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6; /* Blue border on focus */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
            opacity: 0.6;
        }

        .form-icon {
            position: absolute;
            left: 0.5rem;
            bottom: 0.5rem;
            width: 18px;
            height: 18px;
            stroke: #6b7280;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        /* Auth Button */
        .auth-button {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.375rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
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
            background-color: #ff7300; /* Blue button */
            color: white;
        }

        .auth-button.primary:hover {
            background-color:rgb(240, 111, 6); /* Darker blue on hover */
        }

        /* Auth Alerts */
        .auth-alert {
            padding: 0.75rem;
            border-radius: 0.375rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .auth-alert.error {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border-left: 3px solid #ef4444;
        }

        .auth-alert.success {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border-left: 3px solid #10b981;
        }

        .auth-error-list {
            list-style: none;
            padding-left: 0;
        }

        .auth-error-list li {
            margin-bottom: 0.25rem;
        }

        .auth-error-list li:last-child {
            margin-bottom: 0;
        }

        /* Auth Footer */
        .auth-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* Form Link */
        .form-link {
            color: #ff7300;
            text-decoration: none;
            font-weight: 500;
        }

        .form-link:hover {
            text-decoration: underline;
        }
    </style>
@endsection