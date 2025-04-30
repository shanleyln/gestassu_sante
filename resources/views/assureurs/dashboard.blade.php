@extends('layouts.assureur')

@section('title', 'Tableau de bord Assureur')

@section('content')
    <div class="text-secondary my-3">
        Bienvenue sur l’espace assureur. Cette interface vous permet de suivre vos contrats, sinistres, et échanges.
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Contrats actifs</h5>
                    <p class="display-6">124</p>
                </div>
            </div>
        </div>
        <!-- Tu peux ajouter d'autres cartes ici -->
    </div>
@endsection
