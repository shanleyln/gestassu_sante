@extends('layouts.assureur')

@section('content')
    <div class="breadcrumb-custom mb-3">
        <h4 class="mt-2">
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
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold mb-0">{{ $contrats }}</p>
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
                                <p class="h3 fw-bold textPrimary mb-0 mt-3">{{ $souscripteurs }}</p>
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
                                <p class="h3 fw-bold textPrimary mb-0 mt-3">{{ $contratsActifs }}</p>
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
                                <p class="h3 fw-bold textPrimary mb-0 mt-3">{{ $echeances }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

<div class="row g-4 mt-3">
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
                            <p class="h3 fw-bold  mb-0">{{ $assures }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

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
                            <p class="h3 fw-bold  mb-0">{{ $primes }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

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
                            <p class="h3 fw-bold  mb-0">{{ $sinistres }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

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
                            <p class="h3 fw-bold  mb-0">{{ $prestataires }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

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
                            <p class="h3 fw-bold  mb-0">{{ $prisesEnCharge }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
