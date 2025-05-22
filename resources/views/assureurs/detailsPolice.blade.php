@extends('layouts.assureur')
@section('content')
    <div class="breadcrumb-custom mb-3">
        <h4 class="pt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="{{ route('assureur.contrats') }}" class="breadcrumb-link">Gestion des contrats</a>
        </h4>
        <h4 class="pt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="{{ route('assureur.contratsDetails', ['police', null]) }}" class="breadcrumb-link">Détails du
                contrat</a>
        </h4>
        <h4 class="pt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="#" class="breadcrumb-link1">Détails de police</a>
        </h4>
    </div>
    <div class="container-fluid p-3">
        <div class="row">
            <!-- COLONNE GAUCHE -->
            <div class="col-md-3">
                <!-- Infos contrat -->
                <div class="bg-light border rounded p-3 mb-3">
                    <h6 class="bgPrimary py-2 px-2 rounded">Informations du contrat</h6>
                    <p class="textPrimary"><strong>N° Contrat :</strong> 20251231</p>
                    <p class="textPrimary"><strong>Souscripteur :</strong> ANAC</p>
                    <p class="textPrimary"><strong>Date échéance :</strong> 31/12/2025</p>
                </div>

                <!-- Infos police -->
                <div class="bg-light border rounded p-3 mb-3">
                    <h6 class="bgPrimary  py-2 px-2 rounded">Informations de la police</h6>
                    <p class="textPrimary"><strong>Nom Police :</strong> ANAC SANTE</p>
                    <p class="textPrimary"><strong>Type personnel :</strong> Cadre</p>
                    <p class="textPrimary"><strong>Date effet :</strong> 02/04/2025</p>
                    <p class="textPrimary"><strong>Date échéance :</strong> 31/12/2025</p>
                    <p class="textPrimary"><strong>Tarif :</strong> 0</p>
                </div>

                <!-- Statistiques -->
                <div class="bg-light border rounded p-3">
                    <h6 class="bgPrimary text-white py-2 px-2 rounded">Statistiques</h6>
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border rounded textPrimary py-2">
                                <small>Total Bénéf.</small><br><strong>2</strong>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded textPrimary py-2">
                                <small>Principaux</small><br><strong>1</strong>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded textPrimary py-2">
                                <small>Affilié</small><br><strong>1</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLONNE DROITE -->
            <div class="col-md-9">
                <!-- Onglets + bouton -->
                {{-- <div class="d-flex justify-content-between align-items-center mb-2">
                    <ul class="nav nav-tabs border-0">
                        <li class="nav-item">
                            <a class="nav-link active textPrimary" href="#">Bénéficiaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link textPrimary" href="#">Garanties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link textPrimary" href="#">Tarifs</a>
                        </li>
                    </ul>
                </div> --}}
                <form class="row g-3 align-items-end mb-4">

                    <div class="col-md-3">
                        <label class="form-label">Statut Assuré </label>
                        <select class="form-select shadowInput">
                            <option selected>Choisir...</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Recherche...</label>
                        <input type="text" class="form-control shadowInput" placeholder="Rechercher...">
                    </div>
                </form>
                <!-- Tableau bénéficiaires -->
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead style="background-color: #5e2d17; color: white;">
                            <tr>
                                <th style="background-color: #5e2d17; color: white;">Matricule</th>
                                <th style="background-color: #5e2d17; color: white;">Nom</th>
                                <th style="background-color: #5e2d17; color: white;">Prénom</th>
                                <th style="background-color: #5e2d17; color: white;">Assuré principal</th>
                                <th style="background-color: #5e2d17; color: white;">Affilié à</th>
                                <th style="background-color: #5e2d17; color: white;">Lien</th>
                                <th style="background-color: #5e2d17; color: white;">Date naissance</th>
                                <th style="background-color: #5e2d17; color: white;">Genre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GA-A2-A125-02-0002-CI57-8</td>
                                <td>MOUSSIOU NZA</td>
                                <td>Jessica</td>
                                <td><input type="checkbox" disabled></td>
                                <td></td>
                                <td>Conjoint(e)</td>
                                <td>27/02/1994</td>
                                <td>Femme</td>
                            </tr>
                            <tr>
                                <td>GA-A2-A125-02-0001-817C-0</td>
                                <td>MOULOUNGUI M1</td>
                                <td>Hamadou A</td>
                                <td><input type="checkbox" checked disabled></td>
                                <td></td>
                                <td></td>
                                <td>05/06/1992</td>
                                <td>Homme</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
