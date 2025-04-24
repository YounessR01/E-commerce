@extends('layouts.app')

@section('content')
<div class="card-container">
    <h1>Edit User</h1>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" class="form-control">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<style>
    .card-container {
        --form-max-width: 600px;
        --form-padding: 2rem;
        --form-gap: 1.5rem;
        --text-primary: #333;
        --text-secondary: #666;
        --border-color: #ddd;
        --border-radius: 8px;
        --primary-color: #3b82f6;
        --error-color: #ef4444;
        --success-color: #10b981;
        
        max-width: var(--form-max-width);
        margin-inline: auto;
        padding: var(--form-padding);
        background-color: #fff;
        border-radius: var(--border-radius);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 2rem; /* Adds a margin to the top for separation */
    }

    h1 {
        color: var(--text-primary);
        font-size: 1.75rem;
        margin-bottom: var(--form-gap);
        text-align: center;
    }

    .form-group {
        display: grid;
        gap: 0.5rem;
    }

    .form-group label {
        color: var(--text-primary);
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        font-size: 1rem;
        background-color: #f9f9f9;
    }

    .form-control:focus {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }

    button.btn-primary {
        padding: 0.75rem 1.5rem;
        margin-top: 1rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
        background-color: #ff7300;
        color: white;
    }

    button.btn-primary:hover {
        background-color:rgb(226, 113, 20);
    }

    @media (prefers-color-scheme: dark) {
        .card-container {
            --text-primary: black;
            --text-secondary: #ccc;
            --border-color: #444;
            --primary-color: #60a5fa;
        }
    }
</style>
@endsection
 