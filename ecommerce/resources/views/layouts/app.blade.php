<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-commerce')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Light theme */
            --color-primary: 255 115 0; /* RGB values for orange */
            --color-primary-hover: 235 95 0;
            --color-secondary: 59 130 246;
            --color-text: 17 24 39;
            --color-text-muted: 75 85 99;
            --color-bg: 249 250 251;
            --color-bg-elevated: 255 255 255;
            --color-border: 229 231 235;
            --color-success: 22 163 74;
            --color-error: 220 38 38;
            
            /* Spacing */
            --space-xs: 0.25rem;
            --space-sm: 0.5rem;
            --space-md: 1rem;
            --space-lg: 1.5rem;
            --space-xl: 2rem;
            --space-2xl: 3rem;
            
            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            
            /* Border radius */
            --radius-sm: 0.25rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-full: 9999px;
            
            /* Transitions */
            --transition-fast: 100ms ease;
            --transition-normal: 200ms ease;
            --transition-slow: 300ms ease;
        }

        [data-theme="dark"] {
            --color-primary: 255 145 50;
            --color-primary-hover: 255 165 80;
            --color-text: 243 244 246;
            --color-text-muted: 156 163 175;
            --color-bg: 17 24 39;
            --color-bg-elevated: 31 41 55;
            --color-border: 55 65 81;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: rgb(var(--color-text));
            background-color: rgb(var(--color-bg));
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: var(--transition-normal);
        }

        /* Navigation */
        nav {
            background-color: rgb(var(--color-primary));
            color: white;
            padding: var(--space-md) var(--space-lg);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            box-shadow: var(--shadow-md);
            z-index: 50;
        }

        nav::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        }

        .nav-container {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .left, .right {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif;
            padding: var(--space-xs) var(--space-sm);
            border-radius: var(--radius-sm);
            transition: var(--transition-fast);
            position: relative;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: white;
            transition: var(--transition-fast);
        }

        nav a:hover::after {
            width: 70%;
        }

        .logo {
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: var(--space-xs);
        }

        .logo-icon {
            font-size: 1.5rem;
        }

        /* Buttons */
        button, .btn {
            background-color: rgb(var(--color-primary));
            color: white;
            padding: var(--space-sm) var(--space-md);
            border: none;
            border-radius: var(--radius-md);
            cursor: pointer;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            transition: var(--transition-normal);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-xs);
            box-shadow: var(--shadow-sm);
        }

        button:hover, .btn:hover {
            background-color: rgb(var(--color-primary-hover));
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        button:active, .btn:active {
            transform: translateY(0);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid rgb(var(--color-primary));
            color: rgb(var(--color-primary));
        }

        .btn-outline:hover {
            background-color: rgba(var(--color-primary), 0.1);
        }

        .btn-sm {
            padding: var(--space-xs) var(--space-sm);
            font-size: 0.875rem;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: var(--space-lg);
            flex: 1;
        }

        /* Theme toggle */
        .theme-toggle {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: var(--space-xs);
            border-radius: var(--radius-full);
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .theme-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .theme-icon {
            font-size: 1.25rem;
        }

        /* Mobile menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .right {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                height: 100vh;
                background-color: rgb(var(--color-primary));
                flex-direction: column;
                justify-content: flex-start;
                padding: var(--space-2xl) var(--space-lg);
                gap: var(--space-lg);
                transition: var(--transition-normal);
                z-index: 100;
            }

            .right.active {
                right: 0;
            }

            .mobile-menu-btn {
                display: block;
                z-index: 101;
            }

            .mobile-menu-backdrop {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 99;
                opacity: 0;
                pointer-events: none;
                transition: var(--transition-normal);
            }

            .mobile-menu-backdrop.active {
                opacity: 1;
                pointer-events: all;
            }

            nav a {
                width: 100%;
                text-align: center;
                padding: var(--space-sm);
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn var(--transition-normal) forwards;
        }

        /* Utility classes */
        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container">
            <div class="left">
                <a href="/home" class="logo">
                    <span class="logo-icon">🛍️</span>
                    <span>E-commerce</span>
                </a>
            </div>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
            
            <div class="right" id="navRight">
                @auth
                    <a href="{{ route('profile.edit') }}">Profil</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-sm">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Connexion</a>
                    <a href="{{ route('register') }}">S'inscrire</a>
                @endauth

            </div>
        </div>
    </nav>

    <div class="mobile-menu-backdrop" id="mobileMenuBackdrop"></div>

    <div class="container animate-fade-in">
        @yield('content')
    </div>

    <script>
        

        

        
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navRight = document.getElementById('navRight');
        const mobileMenuBackdrop = document.getElementById('mobileMenuBackdrop');
        
        mobileMenuBtn.addEventListener('click', () => {
            navRight.classList.toggle('active');
            mobileMenuBackdrop.classList.toggle('active');
            mobileMenuBtn.textContent = navRight.classList.contains('active') ? '✕' : '☰';
        });
        
        mobileMenuBackdrop.addEventListener('click', () => {
            navRight.classList.remove('active');
            mobileMenuBackdrop.classList.remove('active');
            mobileMenuBtn.textContent = '☰';
        });
    </script>
</body>
</html>