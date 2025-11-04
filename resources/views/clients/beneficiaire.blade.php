@extends('layouts.client')

@section('title', 'Bénéficiaires')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <div class="card px-4 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="simple-breadcrumbs">
                            <li><a href="{{ route('client.contrats') }}" style="font-size:20px">Liste des contrats</a></li>
                            <li><a href="{{ route('client.contratsDetails', ['contrat' => $contrat_id]) }}" class="active"
                                    style="font-size:20px">Détails du contrats</a></li>
                            <li><a href="#" class="active" style="font-size:20px">Détails de police</a></li>
                            <li><a href="#" style="font-size:20px">Liste des bénéficiaires</a></li>
                        </ul>
                    </div>
                </div>
                <div class="faq-header py-3">
                    <h2 class="text-dark f-w-700">Vous cherchez un bénéficiaire ?</h2>
                    <div class="app-form search-div">
                        <div class="input-group b-r-search">
                            <span class="input-group-text bg-primary border-0 "><i class="ti ti-search f-s-18"></i></span>
                            <input class="form-control" id="searchInput" type="text"
                                placeholder="Rechercher un bénéficiaire (nom ou prénom)...">
                        </div>
                    </div>
                </div>
                <div class="equal-card">
                    <div class="card-body">
                        <div class="accordion app-accordion accordion-light-success app-accordion-plus" id="nestingExample">
                            <div class="row g-3">
                                @foreach ($beneficiaires_temp as $index => $famille)
                                    <div class="col-6 mb-2 beneficiaire-item" data-nom="{{ strtolower($famille['nom']) }}"
                                        data-prenom="{{ strtolower($famille['prenom']) }}">
                                        <div class="box-shadow-8 accordion-item">
                                            <h2 class="accordion-header p-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFamille{{ $index }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFamille{{ $index }}">
                                                        <h6 class="text-dark mb-0 txt-ellipsis-1">
                                                            Famille : {{ $famille['nom'] ?? '' }}
                                                            {{ $famille['prenom'] ?? '' }}
                                                        </h6>
                                                    </button>
                                                    <ul class="avatar-group">
                                                        <li class="text-bg-primary h-45 w-45 d-flex-center b-r-50"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-title="{{ $famille['prenom'] ?? '' }}">
                                                            {{ strtoupper(substr($famille['prenom'], 0, 1)) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </h2>

                                            <div id="collapseFamille{{ $index }}"
                                                class="accordion-collapse collapse" data-bs-parent="#accordionFamilles">
                                                <div class="accordion-body">
                                                    <div class="table-responsive mb-2">
                                                        <table class="table table-bordered table-striped align-middle mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date de naissance</th>
                                                                    <th>Genre</th>
                                                                    <th>Lien</th>
                                                                    <th>Email</th>
                                                                    <th>Téléphone</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ \Carbon\Carbon::parse($famille['date_naissance'])->format('d/m/Y') }}
                                                                    </td>
                                                                    <td>{{ $famille['genre'] ?? '' }}</td>
                                                                    <td>{{ $famille['lien_avec_assure'] ?? 'Principal' }}
                                                                    </td>
                                                                    <td>{{ $famille['email'] ?? '-' }}</td>
                                                                    <td>{{ $famille['telephone'] ?? '-' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    @if (!empty($famille['affilies']))
                                                        <ul class="list-box top-brand-list">
                                                            <li class="b-s-4-primary">
                                                                <h5>Liste des ayants droits</h5>
                                                            </li>
                                                        </ul>
                                                        <div class="accordion mt-2 app-accordion app-accordion-icon-left app-accordion-plus"
                                                            id="affiliesAccordion{{ $index }}">
                                                            @foreach ($famille['affilies'] as $j => $ayantDroit)
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header">
                                                                        <button
                                                                            class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseAyantDroit{{ $index }}_{{ $j }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseAyantDroit{{ $index }}_{{ $j }}">
                                                                            <h6 class="text-dark mb-0 txt-ellipsis-1">
                                                                                {{ $ayantDroit['nom'] ?? '' }}
                                                                                {{ $ayantDroit['prenom'] ?? '' }}
                                                                            </h6>
                                                                            <ul class="avatar-group">
                                                                                <li class="text-bg-secondary h-45 w-45 d-flex-center b-r-50"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-title="{{ $ayantDroit['prenom'] ?? '' }}">
                                                                                    {{ strtoupper(substr($ayantDroit['prenom'], 0, 1)) }}
                                                                                </li>
                                                                            </ul>
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseAyantDroit{{ $index }}_{{ $j }}"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#affiliesAccordion{{ $index }}">
                                                                        <div class="accordion-body">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered table-striped align-middle mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Date de naissance</th>
                                                                                            <th>Genre</th>
                                                                                            <th>Lien</th>
                                                                                            <th>Email</th>
                                                                                            <th>Téléphone</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>{{ \Carbon\Carbon::parse($ayantDroit['date_naissance'])->format('d/m/Y') }}
                                                                                            </td>
                                                                                            <td>{{ $ayantDroit['genre'] ?? '' }}
                                                                                            </td>
                                                                                            <td>{{ $ayantDroit['lien_avec_assure'] ?? '' }}
                                                                                            </td>
                                                                                            <td>{{ $ayantDroit['email'] ?? '-' }}
                                                                                            </td>
                                                                                            <td>{{ $ayantDroit['telephone'] ?? '-' }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const searchInput = document.getElementById("searchInput");
                                            const cards = document.querySelectorAll(".beneficiaire-item");

                                            searchInput.addEventListener("input", function() {
                                                const searchTerm = this.value.toLowerCase();

                                                cards.forEach(card => {
                                                    const nom = card.getAttribute('data-nom');
                                                    const prenom = card.getAttribute('data-prenom');
                                                    const match = nom.includes(searchTerm) || prenom.includes(searchTerm);
                                                    card.style.display = match ? 'block' : 'none';
                                                });
                                            });
                                        });
                                    </script>
                                @endforeach

                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
