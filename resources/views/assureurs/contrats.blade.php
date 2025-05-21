@extends('layouts.assureur')

@section('title', 'Gestion des contrats')

@section('content')
 <div class="container-fluid p-4">
    <!-- Formulaire de recherche -->
    <form class="row g-3 align-items-end mb-4">
        <div class="col-md-3">
            <label class="form-label">Type Contrat :</label>
            <select class="form-select">
                <option selected>Choisir...</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Statut :</label>
            <select class="form-select">
                <option selected>Choisir...</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Assureur :</label>
            <input type="text" class="form-control" placeholder="Sélectionner">
        </div>
        <div class="col-md-3">
            <label class="form-label">Souscripteur :</label>
            <input type="text" class="form-control" placeholder="Rechercher...">
        </div>
    </form>

    <!-- Tableau -->
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle" >
            <thead>
                <tr>
                    <th style="background-color: #5e2d17; color: white;">Statut</th>
                    <th style="background-color: #5e2d17; color: white;">Code Système</th>
                    <th style="background-color: #5e2d17; color: white;">Numéro contrat</th>
                    <th style="background-color: #5e2d17; color: white;">Type contrat</th>
                    <th style="background-color: #5e2d17; color: white;">Souscripteur</th>
                    <th style="background-color: #5e2d17; color: white;">Date souscription</th>
                    <th style="background-color: #5e2d17; color: white;">Date échéance</th>
                    <th style="background-color: #5e2d17; color: white;">Description</th>
                    <th style="background-color: #5e2d17; color: white;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-primary fw-semibold">Actif</td>
                    <td>GA-A2-A125</td>
                    <td>265/2025-01</td>
                    <td>Collectif</td>
                    <td>ANAC</td>
                    <td>01/01/2025</td>
                    <td>31/12/2025</td>
                    <td>Contrat Santé</td>
                    <td>
                        <a href="{{route('assureur.contratsDetails',['contrat',null])}}" class="btn" style="background-color: #5e2d17;color: white;">Détails</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
