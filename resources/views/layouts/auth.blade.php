<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Authentification')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts - Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
        rel="stylesheet">

    <style>
    /* ========================================
                   VARIABLES (chartre graphique)
                ======================================== */
    :root {
        --primary-dark: #1E3A8A;
        --primary-light: #3B82F6;
        --primary-hover: #2563EB;
        --bg-gray: #F3F4F6;
        --text-dark: #111827;
        --text-gray: #6B7280;
        --white: #FFFFFF;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.08);
        --radius: 12px;
        --radius-sm: 8px;
        --transition: all 0.25s ease-in-out;
    }

    /* ========================================
                   BASE
                ======================================== */
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }

    /* ========================================
                   AUTH CARD
                ======================================== */
    .auth-card {
        background: var(--white);
        border: none;
        border-radius: var(--radius);
        box-shadow: 0 20px 60px rgba(30, 58, 138, 0.25);
        padding: 2.5rem 2rem;
        width: 100%;
        max-width: 440px;
        animation: fadeInUp 0.5s ease-in-out;
    }

    .auth-card .brand {
        text-align: center;
        margin-bottom: 2rem;
    }

    .auth-card .brand .logo-icon {
        width: 64px;
        height: 64px;
        background: var(--primary-dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.75rem;
        color: var(--white);
        font-size: 1.75rem;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
    }

    .auth-card .brand h2 {
        font-weight: 700;
        font-size: 1.35rem;
        color: var(--text-dark);
        margin: 0;
        letter-spacing: -0.3px;
    }

    .auth-card .brand p {
        font-size: 0.85rem;
        color: var(--text-gray);
        margin: 0.25rem 0 0;
    }

    /* ========================================
                   FORMULAIRE AUTH
                ======================================== */
    .auth-card .form-label {
        font-weight: 500;
        font-size: 0.85rem;
        color: var(--text-dark);
        margin-bottom: 0.35rem;
    }

    .auth-card .form-control {
        border: 1.5px solid #E5E7EB;
        border-radius: var(--radius-sm);
        padding: 0.7rem 1rem;
        font-size: 0.9rem;
        transition: var(--transition);
        background: var(--white);
    }

    .auth-card .form-control:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
        outline: none;
    }

    .auth-card .form-control.is-invalid {
        border-color: #EF4444;
    }

    .auth-card .form-control.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12);
    }

    .auth-card .invalid-feedback {
        font-size: 0.8rem;
        color: #EF4444;
        margin-top: 0.25rem;
    }

    /* ========================================
                   BOUTONS AUTH
                ======================================== */
    .btn-auth {
        background: var(--primary-dark);
        border: none;
        color: var(--white);
        padding: 0.7rem 1.5rem;
        border-radius: var(--radius-sm);
        font-weight: 600;
        font-size: 0.95rem;
        width: 100%;
        transition: var(--transition);
    }

    .btn-auth:hover {
        background: var(--primary-hover);
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(30, 58, 138, 0.3);
    }

    .btn-auth:active {
        transform: translateY(0);
    }

    /* ========================================
                   LIENS AUTH
                ======================================== */
    .auth-links {
        text-align: center;
        margin-top: 1.25rem;
        font-size: 0.85rem;
    }

    .auth-links a {
        color: var(--primary-light);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .auth-links a:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    /* ========================================
                   ALERTES / ERREURS
                ======================================== */
    .alert-auth {
        border: none;
        border-radius: var(--radius-sm);
        padding: 0.75rem 1rem;
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }

    .alert-auth.alert-danger {
        background: #FEE2E2;
        color: #991B1B;
    }

    .alert-auth.alert-success {
        background: #D1FAE5;
        color: #065F46;
    }

    /* ========================================
                   CHECKBOX (Remember me)
                ======================================== */
    .form-check-input {
        border: 1.5px solid #D1D5DB;
        border-radius: 4px;
        cursor: pointer;
        transition: var(--transition);
    }

    .form-check-input:checked {
        background-color: var(--primary-light);
        border-color: var(--primary-light);
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        border-color: var(--primary-light);
    }

    .form-check-label {
        font-size: 0.85rem;
        color: var(--text-gray);
        cursor: pointer;
    }

    /* ========================================
                   ANIMATIONS
                ======================================== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ========================================
                   RESPONSIVE
                ======================================== */
    @media (max-width: 480px) {
        .auth-card {
            padding: 1.75rem 1.25rem;
        }

        .auth-card .brand h2 {
            font-size: 1.1rem;
        }
    }
    </style>

    @stack('styles')
</head>

<body>

    <div class="auth-card">
        {{-- BRAND --}}
        <div class="brand">
            <div class="logo-icon">
                <i class="fas fa-building"></i>
            </div>
            <h2>Agence Immobilière</h2>
            <p>Gestion de biens professionnelle</p>
        </div>

        {{-- CONTENT --}}
        @yield('content')
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')
</body>

</html>