@extends('layouts.app')

@section('content')
<div class="profile-form">
    <h2 class="profile-form__title">Modifier le Profil</h2>

    @if(session('success'))
        <div class="alert alert--success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="form">
        @csrf

        <div class="form__group">
            <label class="form__label">Prénom :</label>
            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form__input">
            @error('first_name') <div class="form__error">{{ $message }}</div> @enderror
        </div>

        <div class="form__group">
            <label class="form__label">Nom:</label>
            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form__input">
            @error('last_name') <div class="form__error">{{ $message }}</div> @enderror
        </div>

        <div class="form__group">
            <label class="form__label">Adresse :</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form__input">
        </div>

        <div class="form__group">
            <label class="form__label">Ville :</label>
            <input type="text" name="city" value="{{ old('city', $user->city) }}" class="form__input">
        </div>

        <div class="form__group">
            <label class="form__label">Pays :</label>
            <input type="text" name="country" value="{{ old('country', $user->country) }}" class="form__input">
        </div>

        <div class="form__group">
            <label class="form__label">Nouveau mot de passe :</label>
            <input type="password" name="password" class="form__input">
            @error('password') <div class="form__error">{{ $message }}</div> @enderror
        </div>

        <div class="form__group">
            <label class="form__label">Confirmer le nouveau mot de passe :</label>
            <input type="password" name="password_confirmation" class="form__input">
        </div>

        <button type="submit" class="button button--primary">Mettre à jour</button>
    </form>
</div>

<style>
    .profile-form {
        --form-max-width: 600px;
        --form-padding: 2rem;
        --form-gap: 1.5rem;
        --text-primary: #000000;
        --text-secondary: #555;
        --border-color: #bbb;
        --bg-color: #ffffff;
        --input-bg-color: #f9f9f9;
        --border-radius: 8px;
        --primary-color: #3b82f6;
        --error-color: #ef4444;
        --success-color: #10b981;

        max-width: var(--form-max-width);
        margin-inline: auto;
        padding: var(--form-padding);
        background-color: var(--bg-color);
        border-radius: var(--border-radius);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-form__title {
        color: var(--text-primary);
        font-size: 1.75rem;
        margin-block-end: var(--form-gap);
        text-align: center;
    }

    .form {
        display: grid;
        gap: var(--form-gap);
    }

    .form__group {
        display: grid;
        gap: 0.5rem;
    }

    .form__label {
        color: var(--text-primary);
        font-weight: 500;
    }

    .form__input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        background-color: var(--input-bg-color);
        font-size: 1rem;
        color: var(--text-primary);
    }

    .form__input:focus {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }

    .form__error {
        color: var(--error-color);
        font-size: 0.875rem;
    }

    .alert {
        padding: 1rem;
        border-radius: var(--border-radius);
        margin-block-end: var(--form-gap);
    }

    .alert--success {
        background-color: color-mix(in srgb, var(--success-color) 10%, white);
        color: var(--success-color);
    }

    .button {
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
    }

    .button--primary {
        background-color: #ff7300;
        color: white;
    }

    .button--primary:hover {
        background-color: rgb(233, 114, 18);
    }
</style>

@endsection
