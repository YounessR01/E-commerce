@extends('layouts.app')

@section('content')
    <div class="card">
        <h1 class="card__title">Bienvenue à la page d'accueil !</h1>
        <p class="card__text">Vous êtes connecté et votre email est vérifié.</p>
    </div>

    <style>
        .card {
            --card-bg: white;
            --card-shadow: 0 0 10px rgba(0,0,0,0.1);
            --card-radius: 10px;
            --text-primary: #4CAF50;
            --text-secondary: #333;
            --space-md: 2rem;
            
            background: var(--card-bg);
            max-width: min(600px, 90%);
            margin-inline: auto;
            padding: var(--space-md);
            box-shadow: var(--card-shadow);
            border-radius: var(--card-radius);
            text-align: center;
        }

        .card__title {
            color: var(--text-primary);
            font-size: clamp(1.5rem, 4vw, 2rem);
            margin-block-end: 1rem;
        }

        .card__text {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        @media (prefers-color-scheme: dark) {
            .card {
                --card-bg: #1e1e1e;
                --card-shadow: 0 0 10px rgba(0,0,0,0.3);
                --text-primary: #81C784;
                --text-secondary: #e0e0e0;
            }
        }
    </style>
@endsection