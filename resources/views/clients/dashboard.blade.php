@extends('layouts.client')

@section('title', 'Mon Tableau de bord')

@section('content')
    <div class="text-secondary my-3">
        Bienvenue sur votre espace client. Vous pouvez gérer vos contrats, suivre vos remboursements, et bien plus.
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Contrats actifs</h5>
                    <p class="display-6">3</p>
                </div>
            </div>
        </div>
        <!-- Autres cartes si besoin -->
    </div>
@endsection
