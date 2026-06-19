<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Administration')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 (gratuit) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts - Inter (moderne et pro) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
        rel="stylesheet">

    <!-- Styles personnalisés -->
    <style>
    /* ========================================
                   VARIABLES (charte graphique)
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
                   RESET & BASE
                ======================================== */
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background-color: var(--bg-gray);
        color: var(--text-dark);
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* ========================================
                   SIDEBAR (bleu foncé pro)
                ======================================== */
    .sidebar {
        background: var(--primary-dark);
        min-height: 100vh;
        padding: 1.5rem 0;
        position: sticky;
        top: 0;
        height: 100vh;
        overflow-y: auto;
        box-shadow: 2px 0 12px rgba(30, 58, 138, 0.15);
        transition: var(--transition);
    }

    .sidebar .brand {
        color: var(--white);
        font-size: 1.25rem;
        font-weight: 700;
        text-align: center;
        padding: 0 1.25rem 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        letter-spacing: -0.3px;
    }

    .sidebar .brand i {
        color: var(--primary-light);
        margin-right: 8px;
    }

    .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.7);
        padding: 0.7rem 1.5rem;
        margin: 0.2rem 0.75rem;
        border-radius: var(--radius-sm);
        font-size: 0.9rem;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }

    .sidebar .nav-link i {
        width: 20px;
        font-size: 1rem;
        text-align: center;
        flex-shrink: 0;
    }

    .sidebar .nav-link:hover {
        background: rgba(255, 255, 255, 0.08);
        color: var(--white);
    }

    .sidebar .nav-link.active {
        background: rgba(255, 255, 255, 0.12);
        color: var(--white);
        box-shadow: inset 3px 0 0 var(--primary-light);
    }

    /* ========================================
                   MAIN CONTENT
                ======================================== */
    .main-content {
        min-height: 100vh;
        background: var(--bg-gray);
    }

    /* ========================================
                   NAVBAR (propre et léger)
                ======================================== */
    .top-navbar {
        background: var(--white);
        padding: 0.85rem 2rem;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 0;
        z-index: 100;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    .top-navbar .page-title {
        font-weight: 600;
        font-size: 1.15rem;
        color: var(--text-dark);
        margin: 0;
    }

    .top-navbar .page-title small {
        font-weight: 400;
        font-size: 0.8rem;
        color: var(--text-gray);
        margin-left: 8px;
    }

    .top-navbar .user-info {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .top-navbar .user-info .avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--primary-light);
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .top-navbar .user-info .badge-dot {
        width: 8px;
        height: 8px;
        background: #10B981;
        border-radius: 50%;
        display: inline-block;
        margin-right: 4px;
    }

    /* ========================================
                   CONTENT WRAPPER
                ======================================== */
    .content-wrapper {
        padding: 2rem;
    }

    /* ========================================
                   CARDS (blanc, ombre douce)
                ======================================== */
    .card-custom {
        background: var(--white);
        border: none;
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        overflow: hidden;
    }

    .card-custom:hover {
        box-shadow: var(--shadow-md);
    }

    .card-custom .card-header {
        background: transparent;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.25rem 1.5rem;
        font-weight: 600;
        font-size: 1rem;
    }

    .card-custom .card-body {
        padding: 1.5rem;
    }

    /* ========================================
                   BUTTONS (Bleu primaire)
                ======================================== */
    .btn-primary-custom {
        background: var(--primary-light);
        border: none;
        color: var(--white);
        padding: 0.5rem 1.25rem;
        border-radius: var(--radius-sm);
        font-weight: 500;
        font-size: 0.9rem;
        transition: var(--transition);
    }

    .btn-primary-custom:hover {
        background: var(--primary-hover);
        color: var(--white);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.35);
    }

    .btn-outline-custom {
        background: transparent;
        border: 1.5px solid var(--primary-light);
        color: var(--primary-light);
        padding: 0.5rem 1.25rem;
        border-radius: var(--radius-sm);
        font-weight: 500;
        font-size: 0.9rem;
        transition: var(--transition);
    }

    .btn-outline-custom:hover {
        background: var(--primary-light);
        color: var(--white);
        transform: translateY(-1px);
    }

    /* ========================================
                   TABLES (épurées)
                ======================================== */
    .table-custom {
        border-collapse: separate;
        border-spacing: 0 4px;
    }

    .table-custom thead th {
        background: var(--bg-gray);
        color: var(--text-gray);
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        padding: 0.75rem 1rem;
    }

    .table-custom tbody td {
        background: var(--white);
        border: none;
        padding: 0.85rem 1rem;
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .table-custom tbody tr {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: var(--transition);
    }

    .table-custom tbody tr:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        transform: scale(1.002);
    }

    /* ========================================
                   FORMULAIRE (propre)
                ======================================== */
    .form-control-custom {
        border: 1.5px solid #E5E7EB;
        border-radius: var(--radius-sm);
        padding: 0.65rem 1rem;
        font-size: 0.9rem;
        transition: var(--transition);
        background: var(--white);
    }

    .form-control-custom:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
        outline: none;
    }

    .form-label-custom {
        font-weight: 500;
        font-size: 0.85rem;
        color: var(--text-dark);
        margin-bottom: 0.35rem;
    }

    /* ========================================
                   STATS CARDS (KPI)
                ======================================== */
    .stat-card {
        background: var(--white);
        border-radius: var(--radius);
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        border-left: 4px solid var(--primary-light);
    }

    .stat-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .stat-card .stat-number {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1.2;
    }

    .stat-card .stat-label {
        font-size: 0.8rem;
        color: var(--text-gray);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    /* ========================================
                   BADGES / STATUS
                ======================================== */
    .badge-status {
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .badge-status.bg-success-custom {
        background: #D1FAE5;
        color: #065F46;
    }

    .badge-status.bg-warning-custom {
        background: #FEF3C7;
        color: #92400E;
    }

    .badge-status.bg-danger-custom {
        background: #FEE2E2;
        color: #991B1B;
    }

    /* ========================================
                   RESPONSIVE
                ======================================== */
    @media (max-width: 768px) {
        .sidebar {
            min-height: auto;
            height: auto;
            position: relative;
            padding: 1rem;
        }

        .top-navbar {
            padding: 0.75rem 1rem;
            flex-wrap: wrap;
            gap: 8px;
        }

        .content-wrapper {
            padding: 1rem;
        }

        .stat-card {
            padding: 1rem;
        }
    }

    /* ========================================
                   ANIMATIONS (douces)
                ======================================== */
    .fade-in {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scrollbar personnalisé */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: var(--bg-gray);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-light);
        border-radius: 8px;
    }
    </style>

    @stack('styles')
</head>

<body>

    <div class="container-fluid p-0">
        <div class="row g-0">

            {{-- ========================================
            SIDEBAR
            ======================================== --}}
            <aside class="col-md-2 col-lg-2 sidebar d-none d-md-block">
                @include('admin.components.sidebar')
            </aside>

            {{-- ========================================
            MAIN CONTENT
            ======================================== --}}
            <main class="col-md-10 col-lg-10 main-content">

                {{-- Navbar --}}
                @include('admin.components.navbar')

                {{-- Page Content --}}
                <div class="content-wrapper fade-in">
                    @yield('content')
                </div>

            </main>

        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')
</body>

</html>