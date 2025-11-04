@extends('layouts.prestataire')

@section('title', 'Tableau de Bord')

@section('content')
    <!-- STYLES -->
    <style>
        @keyframes fadeInBody {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .hero-section {
            background: linear-gradient(to right, #5c5d5d, #5e2d17);
            color: white;
            padding: 2rem 2rem;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            animation: slideFadeIn 1s ease-in-out;
        }

        @keyframes slideFadeIn {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .section-title {
            border-left: 5px solid #5c5d5d;
            padding-left: 10px;
            font-weight: 700;
            font-size: 1.5rem;
            color: #102147;
            position: relative;
        }

        .textPrimary {
            color: #5e2d17;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 50px;
            height: 3px;
            background: #5e2d17;
        }

        .highlight-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 8px;
        }

        .highlight-card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .highlight-card i {
            transition: transform 0.3s ease;
        }

        .highlight-card:hover i {
            transform: scale(1.2) rotate(3deg);
        }

        .list-group-item {
            border-radius: 8px;
            transition: background 0.3s, transform 0.2s;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
            transform: translateX(5px);
        }

        .badge {
            font-size: 0.85rem;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- CONTENU -->
    <div class="container py-4">
        <!-- Hero section -->
        <div class="hero-section text-center mb-5">
            <h1 class="display-5 fw-bold">Bienvenue dans GESTASSU-SANTÉ</h1>
            <p class="lead">Une plateforme professionnelle pensée pour simplifier la gestion des prises en charge santé.
            </p>
            <p class="mb-0"><strong>Powered by Ingenium-Assurance – Votre partenaire courtier de confiance</strong></p>
        </div>

        <!-- Avantages mis en avant -->
        <div class="mb-5">
            <h3 class="section-title mb-4 textPrimary">Pourquoi collaborer avec Ingenium-Assurance ?</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card highlight-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-clipboard-check-fill fs-1 textPrimary mb-3"></i>
                            <h5 class="card-title fw-semibold">Gestion optimisée des bénéficiaires</h5>
                            <p class="card-text">Accédez en temps réel aux informations essentielles de vos assurés avec un
                                suivi structuré et rapide.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card highlight-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill fs-1 textPrimary mb-3"></i>

                            <h5 class="card-title fw-semibold">Collaboration simplifiée</h5>
                            <p class="card-text">Un espace unique de collaboration entre les assureurs, prestataires et le
                                courtier pour un meilleur service.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card highlight-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-graph-up-arrow fs-1 textPrimary mb-3"></i>
                            <h5 class="card-title fw-semibold">Rapports & statistiques clairs</h5>
                            <p class="card-text">Profitez de tableaux de bord dynamiques pour suivre l’évolution des
                                demandes et prises en charge.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bloc d'actualités dynamiques -->
        <div>
            <h3 class="section-title mb-4 textPrimary">Actualités récentes</h3>
            <div class="list-group">
                <a href="#"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-start mb-3">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Formation dédiée aux prestataires de santé</div>
                        Participez à notre webinaire du 5 juin 2025 pour découvrir toutes les nouvelles fonctionnalités
                        GESTASSU.
                    </div>
                    <span class="badge bg-warning text-dark rounded-pill">25 Mai</span>
                </a>

                <a href="#"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-start mb-3">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Activation automatique des conventions partenaires</div>
                        À partir du 1er juillet, les conventions seront générées via votre tableau de bord.
                    </div>
                    <span class="badge bg-primary rounded-pill">24 Mai</span>
                </a>

            </div>
        </div>
    </div>
@endsection
