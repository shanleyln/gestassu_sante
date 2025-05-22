@extends('layouts.assureur')
@section('content')
    <div class="breadcrumb-custom mb-3">
        <h4 class="pt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="{{ route('assureur.contrats') }}" class="breadcrumb-link">Gestion des contrats</a>
        </h4>
        <h4 class="pt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="#" class="breadcrumb-link1">Détails du contrat</a>
        </h4>
    </div>
    <div class="container-fluid px-4 py-3">

        <div class="row">
            <!-- Informations du contrat -->
            <div class="col-md-3">
                <div class="bg-light border rounded shadow-sm p-3 mb-3">
                    <h6 class="text-white px-3 py-2 mb-3 rounded" style="background-color: #5e2d17;">Informations du contrat
                    </h6>
                    <p class="textPrimary"><strong>N° Contrat :</strong></p>
                    <p class="textPrimary"><strong>Souscripteur :</strong></p>
                    <p class="textPrimary"><strong>Assureur :</strong></p>
                    <p class="textPrimary"><strong>Date échéance :</strong></p>
                </div>

                <!-- Statistiques -->
                <div class="bg-light border rounded shadow-sm p-3">
                    <h6 class="text-white px-3 py-2 mb-3 rounded" style="background-color: #5e2d17;">Statistiques</h6>
                    <div class="row text-center">
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small class="">Total police</small><br>
                                <strong>3</strong>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small>Total bénéf.</small><br>
                                <strong>465</strong>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small>Principaux</small><br>
                                <strong>169</strong>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small>Affiliés</small><br>
                                <strong>296</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tableau des polices -->
            <div class="col-md-9">
                <form class="row g-3 align-items-end mb-4">
                    <div class="col-md-3">
                        <label class="form-label">Date debut :</label>
                        <input type="date" class="form-control shadowInput" name="" id="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date fin :</label>
                        <input type="date" class="form-control shadowInput" name="" id="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Recherche...</label>
                        <input type="text" class="form-control shadowInput" placeholder="Rechercher...">
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th style="background-color: #5e2d17; color: white;">N° Police</th>
                                <th style="background-color: #5e2d17; color: white;">Nom police</th>
                                <th style="background-color: #5e2d17; color: white;">Type personnel</th>
                                <th style="background-color: #5e2d17; color: white;">Description</th>
                                <th style="background-color: #5e2d17; color: white;">Date début</th>
                                <th style="background-color: #5e2d17; color: white;">Date fin</th>
                                <th style="background-color: #5e2d17; color: white;">Tarif</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>-</td>
                                <td>ANAC SANTE</td>
                                <td>Cadre</td>
                                <td>ANAC SANTE</td>
                                <td>02/04/2025</td>
                                <td>31/12/2025</td>
                                <td>0</td>
                                <td>
                                    <a href="{{ route('assureur.policeDetails', ['police', null]) }}" class="btn"
                                        style="background-color: #5e2d17;color: white;">Bénéficaire</a>
                                </td>
                            </tr>
                            <tr>
                                <td>265/2025-01</td>
                                <td>ANAC SANTE</td>
                                <td>Employé/Ouvrier</td>
                                <td>Assurance Santé ANAC</td>
                                <td>01/01/2025</td>
                                <td>31/12/2025</td>
                                <td>0</td>
                                <td>
                                    <a href="{{ route('assureur.policeDetails', ['police', null]) }}" class="btn"
                                        style="background-color: #5e2d17;color: white;">Bénéficaire</a>
                                </td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>ANAC SANTE</td>
                                <td>Cadre</td>
                                <td>ANAC SANTE</td>
                                <td>02/04/2025</td>
                                <td>31/12/2025</td>
                                <td>0</td>
                                <td>
                                    <a href="{{ route('assureur.policeDetails', ['police', null]) }}" class="btn"
                                        style="background-color: #5e2d17;color: white;">Bénéficaire</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
