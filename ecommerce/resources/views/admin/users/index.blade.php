@extends('layouts.app')

@section('content')
<div class="admin-users-container">
    <div class="admin-users-header">
        <h1>Gestion des utilisateurs</h1>
        @if(session('success'))
            <div class="status-message success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="users-table-wrapper">
        <table class="users-table">
            <thead>
                <tr>
                    <th class="column-id">ID</th>
                    <th class="column-name">Nom</th>
                    <th class="column-email">Email</th>
                    <th class="column-role">Rôle</th>
                    <th class="column-actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="column-id">{{ $user->id }}</td>
                        <td class="column-name">
                            <div class="user-avatar">
                                {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="user-fullname">{{ $user->first_name }} {{ $user->last_name }}</div>
                                <div class="user-joined">Inscrit en {{ $user->created_at->format('M Y') }}</div>
                            </div>
                        </td>
                        <td class="column-email">{{ $user->email }}</td>
                        <td class="column-role">
                            <span class="role-badge {{ $user->role }}">{{ ucfirst($user->role) }}</span>
                        </td>
                        <td class="column-actions">
                            @if(auth()->id() !== $user->id)
                                <div class="action-buttons">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        Modifier
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="current-user-indicator">C'est vous !</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<style>
    :root {
        /* Light mode colors */
        --bg-primary: #ffffff;
        --bg-secondary: #f8fafc;
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --border-color: #e2e8f0;
        --accent-primary: #3b82f6;
        --accent-danger: #ef4444;
        --accent-success: #10b981;
        --accent-warning: #f59e0b;
        --avatar-bg: #e0f2fe;
        --avatar-text: #0369a1;
        --admin-badge: #ecfdf5;
        --admin-text: #059669;
        --user-badge: #eff6ff;
        --user-text: #1d4ed8;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    @media (prefers-color-scheme: dark) {
        :root {
            --bg-primary: #1e293b;
            --bg-secondary: #0f172a;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --border-color: #334155;
            --accent-primary: #60a5fa;
            --accent-danger: #f87171;
            --accent-success: #34d399;
            --accent-warning: #fbbf24;
            --avatar-bg: #1e3a8a;
            --avatar-text: #bfdbfe;
            --admin-badge: #064e3b;
            --admin-text: #6ee7b7;
            --user-badge: #1e40af;
            --user-text: #93c5fd;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.15);
        }
    }

    .admin-users-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #ffff;
        color: black;
    }

    .admin-users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .admin-users-header h1 {
        font-size: 1.75rem;
        font-weight: 600;
    }

    .status-message {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
    }

    .status-message.success {
        background-color: color-mix(in srgb, var(--accent-success) 15%, transparent);
        color: var(--accent-success);
    }

    .users-table-wrapper {
        overflow-x: auto;
        border-radius: 0.5rem;
        box-shadow: var(--shadow-sm);
    }

    .users-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: #ffff;
    }

    .users-table th {
        position: sticky;
        top: 0;
        background-color: #ff7300;
        color: white;
        font-weight: 600;
        text-align: left;
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        z-index: 10;
    }

    .users-table td {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .users-table tr:last-child td {
        border-bottom: none;
    }



    .column-id {
        width: 5%;
        font-family: monospace;
        color: var(--text-secondary);
    }

    .column-name {
        width: 25%;
    }

    .column-email {
        width: 30%;
    }

    .column-role {
        width: 15%;
    }

    .column-actions {
        width: 25%;
    }

    .user-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background-color: var(--avatar-bg);
        color: var(--avatar-text);
        font-weight: 600;
        margin-right: 1rem;
    }

    .user-fullname {
        font-weight: 500;
    }

    .user-joined {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    .role-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .role-badge.admin {
        background-color: var(--admin-badge);
        color: var(--admin-text);
    }

    .role-badge.user {
        background-color: var(--user-badge);
        color: var(--user-text);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-edit, .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.15s ease;
        border: none;
    }

    .btn-edit {
        background-color: color-mix(in srgb, var(--accent-primary) 10%, transparent);
        color: var(--accent-primary);
    }

    .btn-edit:hover {
        background-color: color-mix(in srgb, var(--accent-primary) 20%, transparent);
    }

    .btn-delete {
        background-color: color-mix(in srgb, var(--accent-danger) 10%, transparent);
        color: var(--accent-danger);
    }

    .btn-delete:hover {
        background-color: color-mix(in srgb, var(--accent-danger) 20%, transparent);
    }

    .current-user-indicator {
        font-size: 0.875rem;
        color: var(--text-secondary);
        font-style: italic;
    }

    @media (max-width: 768px) {
        .admin-users-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .column-id, .column-joined {
            display: none;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection