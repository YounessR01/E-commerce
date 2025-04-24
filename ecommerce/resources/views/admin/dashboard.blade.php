@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    <h1 class="admin-dashboard__title">Tableau de bord Administrateur</h1>
    <p class="admin-dashboard__text">Bienvenue sur le tableau de bord administrateur.</p>
    <a href="{{ route('admin.users.index') }}" class="admin-dashboard__link">Voir les utilisateurs</a>
</div>


<style>
    .admin-dashboard {
        --text-primary: #333;
        --text-secondary: #666;
        --primary-color:rgb(1, 8, 19);
        --space-md: 2rem;
        --space-lg: 3rem;
        
        max-width: 800px;
        margin-inline: auto;
        padding: var(--space-lg) var(--space-md);
        text-align: center;
    }

    .admin-dashboard__title {
        color: var(--text-primary);
        font-size: 2.5rem;
        margin-block-end: 1rem;
    }

    .admin-dashboard__text {
        color:black;
        font-size: 1.25rem;
        margin-block-end: var(--space-md);
    }

    .admin-dashboard__link {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #ff7300;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .admin-dashboard__link:hover {
        background-color:rgb(232, 114, 18);
        transform: translateY(-2px);
    }

    @media (prefers-color-scheme: dark) {
        .admin-dashboard {
            --text-primary:rgb(0, 0, 0);
            --text-secondary: #ccc;
            --primary-color: #60a5fa;
        }
    }
</style>
@endsection