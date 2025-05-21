@extends('layouts.assureur')

@section('title', 'Tableau de bord')

@section('content')
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
    </div>

@endsection
