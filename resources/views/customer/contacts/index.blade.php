@extends('layouts.app')

@section('title', 'Contact')

@section('content')

{{-- ==========================================
    HERO CONTACT
========================================== --}}
<section class="hero-contact mb-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1>Contactez-nous</h1>
                <p>Une question ? Un projet ? Nous sommes là pour vous répondre</p>
            </div>
        </div>
    </div>
</section>

{{-- ==========================================
    CONTACT
========================================== --}}
<div class="row g-4">

    {{-- LEFT: INFO --}}
    <div class="col-md-4">
        <div class="contact-info-card">
            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <h6>Adresse</h6>
                    <p>Agadir, Maroc</p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <h6>Téléphone</h6>
                    <p><a href="tel:+212600000000">+212 6 00 00 00 00</a></p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h6>Email</h6>
                    <p><a href="mailto:contact@immo.com">contact@immo.com</a></p>
                </div>
            </div>

            <div class="contact-info-item" style="border-bottom: none; margin-bottom: 0; padding-bottom: 0;">
                <div class="contact-info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <h6>Horaires d'ouverture</h6>
                    <p>Lun - Ven : 9h - 18h</p>
                </div>
            </div>
        </div>

        {{-- Social --}}
        <div class="contact-social mt-3">
            <h6 style="font-weight: 600; font-size: 0.9rem; color: var(--text-dark); margin-bottom: 0.75rem;">
                Suivez-nous
            </h6>
            <div class="d-flex gap-2">
                <a href="#" class="contact-social-link" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="contact-social-link" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="contact-social-link" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="contact-social-link" title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="contact-social-link" title="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- RIGHT: FORM --}}
    <div class="col-md-8">
        <div class="contact-form-card">
            <div class="contact-form-header">
                <h5><i class="fas fa-paper-plane me-2" style="color: var(--primary-light);"></i> Envoyez-nous un message
                </h5>
                <p class="mb-0">Nous vous répondons dans les plus brefs délais</p>
            </div>

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="row g-3">
                    {{-- First Name --}}
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <i class="fas fa-user me-1" style="color: var(--primary-light);"></i> Prénom
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="first_name"
                            class="form-control-custom w-100 @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') }}" placeholder="Votre prénom" required>
                        @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <i class="fas fa-user me-1" style="color: var(--primary-light);"></i> Nom
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="last_name"
                            class="form-control-custom w-100 @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') }}" placeholder="Votre nom" required>
                        @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-12">
                        <label class="form-label-custom">
                            <i class="fas fa-envelope me-1" style="color: var(--primary-light);"></i> Email
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" name="email"
                            class="form-control-custom w-100 @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="exemple@email.com" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div class="col-md-12">
                        <label class="form-label-custom">
                            <i class="fas fa-tag me-1" style="color: var(--primary-light);"></i> Sujet
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="subject"
                            class="form-control-custom w-100 @error('subject') is-invalid @enderror"
                            value="{{ old('subject') }}" placeholder="Sujet de votre message" required>
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Message --}}
                    <div class="col-md-12">
                        <label class="form-label-custom">
                            <i class="fas fa-comment me-1" style="color: var(--primary-light);"></i> Message
                            <span class="text-danger">*</span>
                        </label>
                        <textarea name="message"
                            class="form-control-custom w-100 @error('message') is-invalid @enderror" rows="5"
                            placeholder="Décrivez votre demande en quelques mots..."
                            required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="col-md-12">
                        <button type="submit" class="btn-contact-submit w-100">
                            <i class="fas fa-paper-plane me-2"></i> Envoyer le message
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection

@push('styles')
<style>
/* ==========================================
       HERO CONTACT
    ========================================== */
.hero-contact {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
    padding: 3rem 0;
    border-radius: var(--radius);
    color: var(--white);
}

.hero-contact h1 {
    font-weight: 700;
    font-size: 2.2rem;
    margin-bottom: 0.5rem;
}

.hero-contact p {
    font-size: 1.1rem;
    opacity: 0.9;
}

/* ==========================================
       CONTACT INFO CARDS
    ========================================== */
.contact-info-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
}

.contact-info-card:hover {
    box-shadow: var(--shadow-md);
}

.contact-info-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding-bottom: 1rem;
    margin-bottom: 1rem;
    border-bottom: 1px solid #F3F4F6;
}

.contact-info-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    background: #EFF6FF;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-light);
    font-size: 1.1rem;
    transition: var(--transition);
}

.contact-info-item:hover .contact-info-icon {
    background: var(--primary-light);
    color: var(--white);
}

.contact-info-item h6 {
    font-weight: 600;
    font-size: 0.85rem;
    color: var(--text-dark);
    margin-bottom: 0.1rem;
}

.contact-info-item p {
    font-size: 0.9rem;
    color: var(--text-gray);
    margin-bottom: 0;
}

.contact-info-item a {
    color: var(--text-gray);
    text-decoration: none;
    transition: var(--transition);
}

.contact-info-item a:hover {
    color: var(--primary-light);
}

/* ==========================================
       CONTACT SOCIAL
    ========================================== */
.contact-social-link {
    width: 38px;
    height: 38px;
    background: #F3F4F6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-gray);
    font-size: 0.9rem;
    transition: var(--transition);
    text-decoration: none;
}

.contact-social-link:hover {
    background: var(--primary-light);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

/* ==========================================
       CONTACT FORM
    ========================================== */
.contact-form-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
}

.contact-form-card:hover {
    box-shadow: var(--shadow-md);
}

.contact-form-header {
    padding-bottom: 1rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px solid #F3F4F6;
}

.contact-form-header h5 {
    font-weight: 600;
    font-size: 1.05rem;
    color: var(--text-dark);
    margin-bottom: 0.1rem;
}

.contact-form-header p {
    font-size: 0.9rem;
    color: var(--text-gray);
    margin-bottom: 0;
}

/* ==========================================
       FORM ELEMENTS
    ========================================== */
.form-label-custom {
    font-weight: 500;
    font-size: 0.85rem;
    color: var(--text-dark);
    margin-bottom: 0.35rem;
    display: block;
}

.form-control-custom {
    border: 1.5px solid #E5E7EB;
    border-radius: var(--radius-sm);
    padding: 0.7rem 1rem;
    font-size: 0.9rem;
    transition: var(--transition);
    background: var(--white);
    width: 100%;
}

.form-control-custom:focus {
    border-color: var(--primary-light);
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
    outline: none;
}

.form-control-custom.is-invalid {
    border-color: #EF4444;
}

.form-control-custom.is-invalid:focus {
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12);
}

.invalid-feedback {
    font-size: 0.8rem;
    color: #EF4444;
    margin-top: 0.25rem;
    display: block;
}

textarea.form-control-custom {
    resize: vertical;
}

/* ==========================================
       SUBMIT BUTTON
    ========================================== */
.btn-contact-submit {
    background: var(--primary-dark);
    border: none;
    color: var(--white);
    padding: 0.8rem 1.5rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.95rem;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.btn-contact-submit:hover {
    background: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(30, 58, 138, 0.3);
}

/* ==========================================
       RESPONSIVE
    ========================================== */
@media (max-width: 768px) {
    .hero-contact {
        padding: 2rem 0;
    }

    .hero-contact h1 {
        font-size: 1.6rem;
    }

    .contact-info-card {
        padding: 1.25rem;
    }

    .contact-form-card {
        padding: 1.25rem;
    }

    .contact-info-item {
        padding-bottom: 0.75rem;
        margin-bottom: 0.75rem;
    }
}

@media (max-width: 576px) {
    .hero-contact h1 {
        font-size: 1.3rem;
    }

    .hero-contact p {
        font-size: 0.9rem;
    }

    .contact-info-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        font-size: 0.9rem;
    }

    .contact-info-item h6 {
        font-size: 0.8rem;
    }

    .contact-info-item p {
        font-size: 0.8rem;
    }

    .contact-form-header h5 {
        font-size: 0.95rem;
    }

    .btn-contact-submit {
        font-size: 0.85rem;
        padding: 0.7rem 1.25rem;
    }
}
</style>
@endpush