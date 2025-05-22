@extends('layouts.assureur')

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
                        <div class="fw-bold">Nouveau partenariat avec OGAR Vie Assurances</div>
                        Extension de la couverture santé pour les affiliés dès juin 2025.
                    </div>
                    <span class="badge textPrimary rounded-pill">21 Mai</span>
                </a>
                <a href="#"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-start mb-3">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Mise à jour de l'application GESTASSU</div>
                        Ajout de la signature numérique dans les dossiers de prise en charge.
                    </div>
                    <span class="badge bg-secondary rounded-pill">18 Mai</span>
                </a>
                <a href="#"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Nouvelle fonctionnalité : historique des remboursements</div>
                        Consultez les remboursements et validations directement en ligne.
                    </div>
                    <span class="badge bg-success rounded-pill">14 Mai</span>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="breadcrumb-custom mb-3">
        <h4>
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="#" class="breadcrumb-link1">Tableau de bord</a>
        </h4>
    </div>
    <style>
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .dashboard-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border: none;
            border-radius: 15px;
        }

        .textPrimary {
            color: #5e2d17
        }
    </style>
    <!-- Contenu du Dashboard -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="http://" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Nombre de contrats</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-file-earmark-text-fill fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary  text-end">
                                <p class="h3 fw-bold  mb-0">124</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-white" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Souscripteurs</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-people-fill fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 text-end">
                                <p class="h3 fw-bold textPrimary mb-0 mt-3">124</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-white" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Contrats actifs</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-check-circle-fill fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 text-end">
                                <p class="h3 fw-bold textPrimary mb-0 mt-3">4</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-white" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Échéances proches</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-hourglass-split fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 text-end">
                                <p class="h3 fw-bold textPrimary mb-0 mt-3">124</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <div class="row g-4 mt-3">
        <!-- Bloc Assurés -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Assurés</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-people-fill fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary  text-end">
                                <p class="h3 fw-bold  mb-0">14</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Bloc Primes & Cotisations -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Primes & Cotisations</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-folder2-open fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold  mb-0">124</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Bloc Sinistres -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Sinistres</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-exclamation-triangle-fill fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold  mb-0">124</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Bloc Prestataires -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Prestataires</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-buildings fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold  mb-0">124</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Bloc Prises en charge -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="#" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Prises en charge</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-envelope-paper-fill fs-1"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold  mb-0">124</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div> --}}
@endsection
