<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --void: #0B0E1A;
        --panel: #12162B;
        --panel-raised: #171C34;
        --line: #232842;
        --accent: #FFB020;
        --accent-dim: rgba(255, 176, 32, 0.14);
        --accent-hover: #FFC24D;
        --text-primary: #E8E9F0;
        --text-muted: #8B90A8;
        --text-faint: #565C7A;
        --danger: #FF6B6B;
        --danger-bg: rgba(255, 107, 107, 0.08);
        --radius: 14px;
        --radius-sm: 8px;
        --font-display: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        --font-mono: 'JetBrains Mono', 'Courier New', monospace;
        --transition: all 0.2s ease-out;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: var(--font-display);
        min-height: 100vh;
        background: var(--void);
        background-image:
            radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.045) 1px, transparent 0);
        background-size: 28px 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
    }

    /* vertical glow anchored to top, subtle, single source */
    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        height: 400px;
        background: radial-gradient(ellipse at top, rgba(255, 176, 32, 0.08), transparent 70%);
        pointer-events: none;
    }

    .login-wrapper {
        width: 100%;
        max-width: 384px;
        position: relative;
        z-index: 1;
        animation: riseIn 0.55s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes riseIn {
        from {
            opacity: 0;
            transform: translateY(18px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-card {
        background: var(--panel);
        border-radius: var(--radius);
        border: 1px solid var(--line);
        box-shadow:
            0 24px 64px rgba(0, 0, 0, 0.45),
            0 1px 0 rgba(255, 255, 255, 0.03) inset;
        overflow: hidden;
        position: relative;
    }

    /* scan line — plays once on load, not looping */
    .scan-line {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent), transparent);
        animation: scan 1.4s ease-out 0.2s 1;
        opacity: 0;
    }

    @keyframes scan {
        0% {
            opacity: 0;
            transform: translateY(0);
        }

        15% {
            opacity: 1;
        }

        85% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(240px);
        }
    }

    .card-top {
        padding: 28px 28px 20px;
        border-bottom: 1px solid var(--line);
    }

    .badge-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .access-badge {
        display: flex;
        align-items: center;
        gap: 8px;
        font-family: var(--font-mono);
        font-size: 11px;
        font-weight: 500;
        color: var(--text-faint);
        letter-spacing: 0.5px;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--accent);
        box-shadow: 0 0 0 3px var(--accent-dim);
    }

    .session-id {
        font-family: var(--font-mono);
        font-size: 11px;
        color: var(--text-faint);
        letter-spacing: 0.5px;
    }

    .icon-mark {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--accent-dim);
        border: 1px solid rgba(255, 176, 32, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent);
        font-size: 16px;
        margin-bottom: 14px;
    }

    .login-header h1 {
        font-size: 19px;
        font-weight: 700;
        color: var(--text-primary);
        letter-spacing: -0.3px;
        margin-bottom: 4px;
    }

    .login-header .subtitle {
        color: var(--text-muted);
        font-size: 13px;
        line-height: 1.5;
    }

    form {
        padding: 22px 28px 24px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        color: var(--text-faint);
        font-family: var(--font-mono);
        font-size: 10.5px;
        font-weight: 500;
        margin-bottom: 7px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper input {
        width: 100%;
        padding: 11px 14px 11px 38px;
        border: 1px solid var(--line);
        border-radius: var(--radius-sm);
        font-size: 14px;
        font-family: var(--font-display);
        color: var(--text-primary);
        background: var(--panel-raised);
        transition: var(--transition);
        outline: none;
    }

    .input-wrapper input::placeholder {
        color: var(--text-faint);
    }

    .input-wrapper input:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px var(--accent-dim);
    }

    .input-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-faint);
        font-size: 13px;
        transition: var(--transition);
        pointer-events: none;
    }

    .input-wrapper input:focus~.input-icon {
        color: var(--accent);
    }

    .btn-login {
        width: 100%;
        padding: 12px 20px;
        background: var(--accent);
        color: #1A1200;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 14px;
        font-weight: 600;
        font-family: var(--font-display);
        cursor: pointer;
        transition: var(--transition);
        margin-top: 6px;
    }

    .btn-login:hover {
        background: var(--accent-hover);
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(255, 176, 32, 0.25);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .btn-login .btn-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-login .arrow {
        transition: transform 0.25s ease;
        display: inline-block;
        font-size: 13px;
    }

    .btn-login:hover .arrow {
        transform: translateX(3px);
    }

    .error-message {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 11px 14px;
        background: var(--danger-bg);
        border: 1px solid rgba(255, 107, 107, 0.25);
        border-radius: var(--radius-sm);
        color: var(--danger);
        font-size: 12.5px;
        font-weight: 500;
        margin-top: 16px;
        animation: shake 0.35s ease;
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-4px);
        }

        75% {
            transform: translateX(4px);
        }
    }

    .error-message i {
        flex-shrink: 0;
        font-size: 13px;
    }

    .login-footer {
        text-align: center;
        padding: 16px 28px 22px;
        border-top: 1px solid var(--line);
    }

    .login-footer a {
        color: var(--text-faint);
        font-size: 12.5px;
        text-decoration: none;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: var(--font-mono);
    }

    .login-footer a:hover {
        color: var(--accent);
    }

    .login-footer a i {
        font-size: 11px;
        transition: transform 0.25s ease;
    }

    .login-footer a:hover i {
        transform: translateX(-2px);
    }

    @media (prefers-reduced-motion: reduce) {
        * {
            animation: none !important;
            transition: none !important;
        }
    }

    @media (max-width: 480px) {
        .card-top {
            padding: 22px 20px 18px;
        }

        form {
            padding: 18px 20px 20px;
        }

        .login-footer {
            padding: 14px 20px 18px;
        }

        .login-header h1 {
            font-size: 18px;
        }
    }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="scan-line"></div>

            <div class="card-top">
                <div class="badge-row">
                    <div class="access-badge">
                        <span class="status-dot"></span>
                        ACCÈS RESTREINT
                    </div>
                    <div class="session-id">{{ now()->format('Y.m.d') }}</div>
                </div>

                <div class="login-header">
                    <div class="icon-mark">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h1>Connexion administrateur</h1>
                    <p class="subtitle">Authentifiez-vous pour accéder au panneau d'administration.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" placeholder="admin@domaine.com" required autofocus>
                        <i class="fa-regular fa-envelope input-icon"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <i class="fa-solid fa-lock input-icon"></i>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <span class="btn-content">
                        Se connecter
                        <span class="arrow">→</span>
                    </span>
                </button>

                @if ($errors->any())
                <div class="error-message">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
                @endif
            </form>

            <div class="login-footer">
                <a href="#">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour au site
                </a>
            </div>
        </div>
    </div>

</body>

</html>