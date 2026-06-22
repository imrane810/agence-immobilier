<footer
    style="background: var(--primary-dark); color: rgba(255,255,255,0.8); padding: 3rem 0 1.5rem; margin-top: auto; border-top: 1px solid rgba(255,255,255,0.05);">
    <div class="container">

        {{-- ==========================================
        FOOTER TOP - 4 COLONNES
        ========================================== --}}
        <div class="row g-4 pb-4 border-bottom border-light border-opacity-10">

            {{-- 1. À PROPOS (BRANDING) --}}
            <div class="col-md-3">
                <div class="mb-3">
                    <span style="font-size: 1.25rem; font-weight: 700; color: white; letter-spacing: -0.3px;">
                        <i class="fas fa-building" style="color: var(--primary-light);"></i>
                        Agence Immo
                    </span>
                </div>
                <p style="font-size: 0.85rem; line-height: 1.7; color: rgba(255,255,255,0.7); margin-bottom: 0;">
                    Votre partenaire de confiance pour la location de biens immobiliers de qualité au Maroc.
                </p>
                <div style="margin-top: 0.75rem;">
                    <span style="font-size: 0.8rem; color: rgba(255,255,255,0.5);">
                        <i class="fas fa-check-circle me-1" style="color: #10B981;"></i>
                        Qualité certifiée
                    </span>
                </div>
            </div>

            {{-- 2. LIENS RAPIDES --}}
            <div class="col-md-3">
                <h6
                    style="color: white; font-weight: 600; font-size: 0.95rem; margin-bottom: 1rem; letter-spacing: 0.3px; text-transform: uppercase;">
                    Liens rapides
                </h6>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 0.5rem;">
                        <a href="/"
                            style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.85rem; transition: all 0.25s ease-in-out;">
                            <i class="fas fa-chevron-right"
                                style="font-size: 0.6rem; margin-right: 8px; color: var(--primary-light);"></i>
                            Accueil
                        </a>
                    </li>
                    <li style="margin-bottom: 0.5rem;">
                        <a href="{{ route('properties.index') }}"
                            style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.85rem; transition: all 0.25s ease-in-out;">
                            <i class="fas fa-chevron-right"
                                style="font-size: 0.6rem; margin-right: 8px; color: var(--primary-light);"></i>
                            Nos biens
                        </a>
                    </li>
                    <li style="margin-bottom: 0.5rem;">
                        <a href="#"
                            style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.85rem; transition: all 0.25s ease-in-out;">
                            <i class="fas fa-chevron-right"
                                style="font-size: 0.6rem; margin-right: 8px; color: var(--primary-light);"></i>
                            Réservations
                        </a>
                    </li>
                    <li style="margin-bottom: 0.5rem;">
                        <a href="#"
                            style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.85rem; transition: all 0.25s ease-in-out;">
                            <i class="fas fa-chevron-right"
                                style="font-size: 0.6rem; margin-right: 8px; color: var(--primary-light);"></i>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            {{-- 3. CONTACT --}}
            <div class="col-md-3">
                <h6
                    style="color: white; font-weight: 600; font-size: 0.95rem; margin-bottom: 1rem; letter-spacing: 0.3px; text-transform: uppercase;">
                    Contact
                </h6>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 0.75rem; display: flex; align-items: flex-start; gap: 10px;">
                        <i class="fas fa-map-marker-alt"
                            style="color: var(--primary-light); font-size: 0.9rem; margin-top: 3px;"></i>
                        <span style="font-size: 0.85rem; color: rgba(255,255,255,0.7); line-height: 1.5;">
                            Agadir, Maroc
                        </span>
                    </li>
                    <li style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-phone" style="color: var(--primary-light); font-size: 0.9rem;"></i>
                        <a href="tel:+212512345678"
                            style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.85rem; transition: all 0.25s ease-in-out;">
                            +212 5 12 34 56 78
                        </a>
                    </li>
                    <li style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-envelope" style="color: var(--primary-light); font-size: 0.9rem;"></i>
                        <a href="mailto:contact@agenceimmo.ma"
                            style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.85rem; transition: all 0.25s ease-in-out;">
                            contact@agenceimmo.ma
                        </a>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-clock" style="color: var(--primary-light); font-size: 0.9rem;"></i>
                        <span style="font-size: 0.85rem; color: rgba(255,255,255,0.7);">
                            Lun - Ven: 9h - 18h
                        </span>
                    </li>
                </ul>
            </div>

            {{-- 4. RÉSEAUX SOCIAUX --}}
            <div class="col-md-3">
                <h6
                    style="color: white; font-weight: 600; font-size: 0.95rem; margin-bottom: 1rem; letter-spacing: 0.3px; text-transform: uppercase;">
                    Suivez-nous
                </h6>
                <p style="font-size: 0.85rem; color: rgba(255,255,255,0.6); margin-bottom: 1rem;">
                    Restez connecté avec nous sur les réseaux sociaux
                </p>
                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="#" title="Facebook"
                        style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.7); transition: all 0.25s ease-in-out; font-size: 1.1rem; text-decoration: none;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" title="Twitter"
                        style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.7); transition: all 0.25s ease-in-out; font-size: 1.1rem; text-decoration: none;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" title="Instagram"
                        style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.7); transition: all 0.25s ease-in-out; font-size: 1.1rem; text-decoration: none;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" title="LinkedIn"
                        style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.7); transition: all 0.25s ease-in-out; font-size: 1.1rem; text-decoration: none;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" title="YouTube"
                        style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.7); transition: all 0.25s ease-in-out; font-size: 1.1rem; text-decoration: none;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

        </div>

        {{-- ==========================================
        FOOTER BOTTOM - COPYRIGHT
        ========================================== --}}
        <div class="row align-items-center mt-3">
            <div class="col-md-6 text-center text-md-start">
                <p style="margin: 0; font-size: 0.8rem; color: rgba(255,255,255,0.4);">
                    <i class="fas fa-building me-1"></i>
                    © {{ date('Y') }} Agence Immobilière. Tous droits réservés.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p style="margin: 0; font-size: 0.75rem; color: rgba(255,255,255,0.3);">
                    <i class="fas fa-code me-1"></i>
                    Développé avec <i class="fas fa-heart" style="color: #EF4444;"></i> Par Imrane
                </p>
            </div>
        </div>

    </div>
</footer>

<style>
/* ==========================================
    FOOTER LINKS HOVER
    ========================================== */
footer ul li a:hover {
    color: white !important;
    padding-left: 4px;
}

/* ==========================================
    SOCIAL ICONS HOVER
    ========================================== */
footer .social-icons a:hover {
    background: var(--primary-light) !important;
    color: white !important;
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

/* ==========================================
    CONTACT LINKS HOVER
    ========================================== */
footer a[href^="tel"]:hover,
footer a[href^="mailto"]:hover {
    color: white !important;
}

/* ==========================================
    RESPONSIVE
    ========================================== */
@media (max-width: 768px) {
    footer {
        padding: 2rem 0 1rem;
    }

    footer .row.g-4 {
        gap: 1.5rem !important;
    }

    footer .col-md-3 {
        text-align: center;
    }

    footer ul li {
        justify-content: center;
    }

    footer .social-icons {
        justify-content: center;
    }
}
</style>