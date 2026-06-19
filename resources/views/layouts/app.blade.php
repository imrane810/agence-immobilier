<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Agence Immobilière')</title>

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
                   VARIABLES
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
        background-color: var(--bg-gray);
        color: var(--text-dark);
        line-height: 1.6;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* ========================================
                   HERO SECTION
                ======================================== */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
        padding: 4rem 0;
        border-radius: var(--radius);
        margin-bottom: 2rem;
        color: var(--white);
    }

    .hero-section h1 {
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .hero-section p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .hero-section .search-box {
        background: var(--white);
        border-radius: var(--radius-sm);
        padding: 0.5rem;
        display: flex;
        gap: 0.5rem;
        max-width: 600px;
    }

    .hero-section .search-box input {
        border: none;
        padding: 0.7rem 1rem;
        flex: 1;
        border-radius: var(--radius-sm);
        outline: none;
        font-size: 0.95rem;
    }

    .hero-section .search-box button {
        background: var(--primary-light);
        border: none;
        color: var(--white);
        padding: 0.7rem 1.5rem;
        border-radius: var(--radius-sm);
        font-weight: 600;
        transition: var(--transition);
    }

    .hero-section .search-box button:hover {
        background: var(--primary-hover);
    }

    /* ========================================
                   CARDS
                ======================================== */
    .property-card {
        background: var(--white);
        border: none;
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        overflow: hidden;
        height: 100%;
    }

    .property-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-6px);
    }

    .property-card .card-img-top {
        height: 220px;
        object-fit: cover;
    }

    .property-card .card-body {
        padding: 1.25rem;
    }

    .property-card .card-title {
        font-weight: 600;
        font-size: 1.05rem;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .property-card .card-text {
        font-size: 0.9rem;
        color: var(--text-gray);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .property-card .price-tag {
        font-weight: 700;
        color: var(--primary-light);
        font-size: 1.2rem;
    }

    .property-card .property-meta {
        display: flex;
        gap: 1rem;
        font-size: 0.85rem;
        color: var(--text-gray);
        padding-top: 0.75rem;
        border-top: 1px solid #F3F4F6;
        margin-top: 0.75rem;
    }

    .property-card .property-meta i {
        color: var(--primary-light);
        width: 16px;
    }

    .btn-primary-public {
        background: var(--primary-light);
        border: none;
        color: var(--white);
        padding: 0.5rem 1.5rem;
        border-radius: var(--radius-sm);
        font-weight: 500;
        font-size: 0.9rem;
        transition: var(--transition);
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary-public:hover {
        background: var(--primary-hover);
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .btn-outline-public {
        background: transparent;
        border: 1.5px solid var(--primary-light);
        color: var(--primary-light);
        padding: 0.5rem 1.5rem;
        border-radius: var(--radius-sm);
        font-weight: 500;
        font-size: 0.9rem;
        transition: var(--transition);
        text-decoration: none;
        display: inline-block;
    }

    .btn-outline-public:hover {
        background: var(--primary-light);
        color: var(--white);
        transform: translateY(-2px);
    }

    /* ========================================
                   SECTION TITLES
                ======================================== */
    .section-title {
        font-weight: 700;
        font-size: 1.75rem;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
    }

    .section-subtitle {
        color: var(--text-gray);
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    /* ========================================
                   ANIMATIONS
                ======================================== */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ========================================
                   AUTH CARD (intégré dans app)
                ======================================== */
    .auth-card {
        background: var(--white);
        border: none;
        border-radius: var(--radius);
        box-shadow: 0 20px 60px rgba(30, 58, 138, 0.25);
        padding: 2.5rem 2rem;
        max-width: 440px;
        margin: 2rem auto;
        animation: fadeIn 0.5s ease-in-out;
    }

    .auth-card .brand {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .auth-card .brand .logo-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.75rem;
        color: var(--white);
        font-size: 1.5rem;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
    }

    .auth-card .brand h3 {
        font-weight: 700;
        font-size: 1.25rem;
        color: var(--text-dark);
        margin: 0;
    }

    .auth-card .brand p {
        font-size: 0.85rem;
        color: var(--text-gray);
        margin: 0.25rem 0 0;
    }

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

    .auth-card .btn-auth {
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

    .auth-card .btn-auth:hover {
        background: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(30, 58, 138, 0.3);
    }

    .auth-card .auth-links {
        text-align: center;
        margin-top: 1.25rem;
        font-size: 0.85rem;
    }

    .auth-card .auth-links a {
        color: var(--primary-light);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .auth-card .auth-links a:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .auth-card .alert-auth {
        border: none;
        border-radius: var(--radius-sm);
        padding: 0.75rem 1rem;
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }

    .auth-card .alert-auth.alert-danger {
        background: #FEE2E2;
        color: #991B1B;
    }

    .auth-card .alert-auth.alert-success {
        background: #D1FAE5;
        color: #065F46;
    }

    .auth-card .form-check-input {
        border: 1.5px solid #D1D5DB;
        border-radius: 4px;
        cursor: pointer;
        transition: var(--transition);
    }

    .auth-card .form-check-input:checked {
        background-color: var(--primary-light);
        border-color: var(--primary-light);
    }

    .auth-card .form-check-label {
        font-size: 0.85rem;
        color: var(--text-gray);
        cursor: pointer;
    }

    /* ========================================
                   RESPONSIVE
                ======================================== */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2.5rem 1rem;
        }

        .hero-section h1 {
            font-size: 1.75rem;
        }

        .hero-section .search-box {
            flex-direction: column;
        }

        .hero-section .search-box button {
            width: 100%;
        }

        .property-card .card-img-top {
            height: 180px;
        }

        .section-title {
            font-size: 1.4rem;
        }

        .auth-card {
            padding: 1.75rem 1.25rem;
            margin: 1rem;
        }
    }

    @media (max-width: 576px) {
        .hero-section h1 {
            font-size: 1.4rem;
        }

        .property-card .card-img-top {
            height: 160px;
        }
    }
    </style>

    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    @include('customer.components.navbar')

    {{-- MAIN CONTENT --}}
    <main class="container py-4 fade-in">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('customer.components.footer')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')
</body>

</html>