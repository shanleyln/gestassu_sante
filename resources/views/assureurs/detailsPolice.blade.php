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
                    <p class="textPrimary"><strong>N° Contrat :</strong> {{ $contrat['numero_contrat'] ?? '------' }}</p>
                    <p class="textPrimary"><strong>Souscripteur :</strong> {{ $contrat['nom_souscripteur'] ?? '------' }}
                    </p>
                    <p class="textPrimary"><strong>Date échéance :</strong>
                        {{ !empty($contrat['date_echeance']) ? \Carbon\Carbon::parse($contrat['date_echeance'])->format('d/m/Y') : '------' }}
                    </p>

                </div>

                <!-- Infos police -->
                <div class="bg-light border rounded p-3 mb-3">
                    <h6 class="bgPrimary  py-2 px-2 rounded">Informations de la police</h6>
                    <p class="textPrimary"><strong>Nom Police :</strong> {{ $police['nom_police'] ?? '------' }}</p>
                    <p class="textPrimary"><strong>Type personnel :</strong> {{ $police['type_personnel'] ?? '------' }}</p>
                    <p class="textPrimary"><strong>Date effet :</strong>
                        {{ !empty($police['date_debut']) ? \Carbon\Carbon::parse($police['date_debut'])->format('d/m/Y') : '------' }}
                    </p>
                    <p class="textPrimary"><strong>Date échéance :</strong>
                        {{ !empty($police['date_fin']) ? \Carbon\Carbon::parse($police['date_fin'])->format('d/m/Y') : '------' }}
                    </p>
                    <p class="textPrimary"><strong>Tarif :</strong> {{ $police['tarif'] ?? 0 }}</p>
                </div>

                <!-- Statistiques -->
                <div class="bg-light border rounded p-3">
                    <h6 class="bgPrimary text-white py-2 px-2 rounded">Statistiques</h6>
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border rounded textPrimary py-2">
                                <small>Total Bénéf.</small><br>
                                <strong>{{ $police['total_beneficiaires'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded textPrimary py-2">
                                <small>Principaux</small><br>
                                <strong>{{ $police['total_assures_principaux'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded textPrimary py-2">
                                <small>Affilié</small><br>
                                <strong>{{ $police['total_affilies'] ?? 0 }}</strong>
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
                        <label class="form-label">Statut Assuré</label>
                        <select class="form-select shadowInput" id="statutSelect">
                            <option value="">Tous</option>
                            <option value="1">Assuré principal</option>
                            <option value="0">Affilié</option>
                        </select>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label class="form-label">Recherche...</label>
                        <input type="text" class="form-control shadowInput" placeholder="Rechercher..."
                            id="searchBeneficiaire">
                    </div>
                </form>
                <!-- Tableau bénéficiaires -->
                <div class="table-responsive">
                    <!-- Tableau des bénéficiaires -->
                    <table class="table table-bordered align-middle text-center">
                        <thead style="background-color: #5e2d17; color: white;">
                            <tr>
                                <th>Matricule</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Assuré principal</th>
                                <th>Affilié à</th>
                                <th>Lien</th>
                                <th>Date naissance</th>
                                <th>Genre</th>
                            </tr>
                        </thead>
                        <tbody id="beneficiaireTable">
                            @foreach ($beneficiaires as $benef)
                                <tr data-statut="{{ $benef['est_assure_principal'] }}">
                                    <td>{{ $benef['matricule'] ?? '-' }}</td>
                                    <td>{{ $benef['nom'] ?? '-' }}</td>
                                    <td>{{ $benef['prenom'] ?? '-' }}</td>
                                    <td><input type="checkbox" disabled
                                            {{ $benef['est_assure_principal'] ? 'checked' : '' }}></td>
                                    <td>{{ $benef['nomprenom_affilie'] ?? '-' }}</td>
                                    <td>{{ $benef['lien_avec_assure'] ?? '-' }}</td>
                                    <td>{{ !empty($benef['date_naissance']) ? \Carbon\Carbon::parse($benef['date_naissance'])->format('d/m/Y') : '------' }}
                                    </td>
                                    <td>{{ $benef['genre'] ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr id="noResultRow" class="text-muted text-center d-none">
                                <td colspan="8">Aucun bénéficiaire trouvé.</td>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchBeneficiaire");
            const statutSelect = document.getElementById("statutSelect");
            const tableRows = document.querySelectorAll("#beneficiaireTable tr");
            const noResultRow = document.getElementById("noResultRow");

            function filterTable() {
                const query = searchInput.value.toLowerCase();
                const selectedStatut = statutSelect.value;
                let visibleCount = 0;

                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    const matchText = text.includes(query);
                    const matchStatut = selectedStatut === "" || row.dataset.statut === selectedStatut;
                    const match = matchText && matchStatut;

                    row.style.display = match ? "" : "none";
                    if (match) visibleCount++;
                });

                noResultRow.classList.toggle("d-none", visibleCount > 0);
            }

            searchInput.addEventListener("input", filterTable);
            statutSelect.addEventListener("change", filterTable);
        });
    </script>
@endsection
