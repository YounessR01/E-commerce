@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Créer un compte</h2>
                <p class="auth-subtitle">Rejoignez notre communauté dès maintenant</p>
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

            <form action="{{ route('register') }}" method="POST" class="auth-form">
                @csrf
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required 
                               class="form-input" placeholder="Votre Prénom ">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required 
                               class="form-input" placeholder="votre Nom">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Adresse e-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           class="form-input" placeholder="votre@email.com">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" name="password" required 
                               class="form-input" placeholder="••••••••">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirmation</label>
                        <input type="password" name="password_confirmation" required 
                               class="form-input" placeholder="••••••••">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Adresse</label>
                    <input type="text" name="address" value="{{ old('address') }}" 
                           class="form-input" placeholder="123 Rue 2 AlQuds">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Ville</label>
                        <input type="text" name="city" value="{{ old('city') }}" 
                               class="form-input" placeholder="Agadir">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pays</label>
                        <input type="text" name="country" value="{{ old('country') }}" 
                               class="form-input" placeholder="Maroc">
                    </div>
                </div>

                <input type="hidden" name="role" value="user">

                <div class="form-agreement">
                    <label class="form-check">
                        <input type="checkbox" name="terms" required>
                        <span class="checkmark"></span>
                        J'accepte les <a href="#" class="form-link"> conditions d'utilisation</a>
                    </label>
                </div>

                <button type="submit" class="auth-button primary">
                    <span>S'inscrire</span>
                </button>
            </form>

            <div class="auth-footer">
                <p>Déjà membre ? <a href="{{ route('login') }}" class="form-link">Se connecter</a></p>
            </div>
        </div>
    </div>

    <style>
        /* Global Variables */
        :root {
            --space-xs: 8px;
            --space-sm: 12px;
            --space-md: 16px;
            --space-lg: 24px;
            --space-xl: 32px;
            --primary-color: rgb(255, 115, 0);  /* Updated to the new orange color */
            --secondary-color: #263238;
            --bg-color: #f7f7f7;
            --text-color: #333;
            --error-color: #ff4d4d;
            --button-hover-bg: rgb(255, 115, 0);  /* Using the same color for hover */
        }

        /* Body Styling */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        /* Container for centering content */
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 var(--space-sm);
        }

        /* Main Auth Card */
        .auth-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: var(--space-lg);
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        /* Header */
        .auth-header {
            text-align: center;
            margin-bottom: var(--space-lg);
        }

        .auth-title {
            font-size: 1.8rem;
            font-weight: 600;
             margin-bottom: var(--space-sm);
        }

        .auth-subtitle {
            font-size: 1rem;
            color: var(--secondary-color);
        }

        /* Form Layout */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
            margin-bottom: var(--space-lg);
        }

        .form-group {
            width: 100%;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: var(--space-xs);
        }

        .form-input {
            width: 100%;
            padding: var(--space-sm);
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            color: var(--text-color);
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .auth-button {
            width: 100%;
            padding: var(--space-sm);
            background-color: var(--primary-color);
            color: #fff;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .auth-button.primary:hover {
            background-color: var(--button-hover-bg);
        }

        /* Form Agreement */
        .form-agreement {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            margin-bottom: var(--space-lg);
        }

        .form-check {
            display: flex;
            align-items: center;
            position: relative;
        }

        .form-check input {
            margin-right: var(--space-xs);
        }

        .checkmark {
            display: inline-block;
            width: 16px;
            height: 16px;
            border-radius: 3px;
            position: absolute;
            left: 0;
        }

        .form-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .form-link:hover {
            text-decoration: underline;
        }

        /* Error Alert */
        .auth-alert.error {
            background-color: var(--error-color);
            color: #fff;
            padding: var(--space-sm);
            border-radius: 8px;
            margin-bottom: var(--space-lg);
        }

        .auth-error-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .auth-error-list li {
            font-size: 0.875rem;
            margin-bottom: var(--space-xs);
        }

        /* Footer */
        .auth-footer {
            text-align: center;
        }

        .auth-footer p {
            font-size: 0.875rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .auth-card {
                padding: var(--space-lg);
            }
        }
    </style>
@endsection
