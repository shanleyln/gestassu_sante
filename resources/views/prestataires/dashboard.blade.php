@extends('layouts.prestataire')

@section('title', 'Tableau de Bord')

@section('content')
    <div class="text-secondary my-3">
        Bienvenue dans votre tableau de bord. Cette section affichera les statistiques en temps réel.
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Vérifications aujourd’hui</h5>
                    <p class="card-text display-6">52</p>
                </div>
            </div>
        </div>
        <!-- D'autres cartes ici -->
    </div>
@endsection
