@extends('layouts.prestataire')

@section('title', 'Tableau de Bord')

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
    <div class="breadcrumb-custom mb-3">
        <h4 class="mt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="#" class="breadcrumb-link1">Tableau de bord</a>
        </h4>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="http://" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Vérification Carte</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-credit-card-2-front-fill fs-2 textPrimary"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold mb-0">0</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="http://" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Prises en charge</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-clipboard-plus fs-2 textPrimary"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold mb-0">0</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="http://" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Factures</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-receipt-cutoff fs-2"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold mb-0">0</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card card shadow rounded bg-light" style="cursor: pointer;">
                <a href="http://" class="text-decoration-none text-reset d-block">
                    <div class="card-body">
                        <h6 class="text-muted">Paiements</h6>
                        <div class="row align-items-center">
                            <div class="col-md-3 textPrimary">
                                <i class="bi bi-receipt-cutoff fs-2"></i>
                            </div>
                            <div class="col"></div>
                            <div class="col-md-3 textPrimary text-end">
                                <p class="h3 fw-bold mb-0">0</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- D'autres cartes ici -->
    </div>
@endsection
