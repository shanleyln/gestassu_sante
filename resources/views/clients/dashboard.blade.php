@extends('layouts.client')

@section('title', 'Mon Tableau de bord')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 d-md-block">
            </div>
            <div class="col-md-10 ms-sm-auto">
                <div class="row">
                    {{-- Carte 1 : Nombre de Bénéficiaires --}}
                    <div class="col-3 col-md-3 col-lg-3 col-sm-12">
                        <div class="card">
                            <span class="bg-primary h-90 w-90 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ti ti-users text-white" style="font-size: 40px;"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <div class="overflow-hidden mt-5">
                                     <h5 class="mb-1">{{-- $nombreBeneficiaires ?? 5 --}} 5</h5>
                                    <h6 class="text-muted mb-0">Personnes Couvertes</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Carte 2 : Contrats Actifs --}}
                    <div class="col-3 col-md-3 col-lg-3 col-sm-12">
                        <div class="card">
                            <span class="bg-primary h-90 w-90 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ti ti-file-description text-white" style="font-size: 40px;"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <div class="overflow-hidden mt-5">
                                    <h5 class="mb-1">{{-- $nombreContrats ?? 2 --}} 2</h5>
                                    <h6 class="text-muted mb-0">Contrats Actifs</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Carte 3 : Remboursements sur 30 jours --}}
                    <div class="col-3 col-md-3 col-lg-3 col-sm-12">
                        <div class="card">
                            <span class="bg-primary h-90 w-90 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ti ti-receipt-2 text-white" style="font-size: 40px;"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <div class="overflow-hidden mt-5">
                                    <h5 class="mb-1">{{-- $remboursements30j ?? '350€' --}} 350 000 000 FCFA</h5>
                                    <h6 class="text-muted mb-0">Remboursements (30j)</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Carte 4 : Prochaine Cotisation --}}
                    <div class="col-3 col-md-3 col-lg-3 col-sm-12">
                        <div class="card">
                            <span class="bg-primary h-90 w-90 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ti ti-calendar-event text-white" style="font-size: 40px;"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <div class="overflow-hidden mt-5">
                                    <h5 class="mb-1">{{-- $prochaineCotisationDate ?? '15/08/24' --}} 15/08/24</h5>
                                    <h6 class="text-muted mb-0">Prochaine Cotisation</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
