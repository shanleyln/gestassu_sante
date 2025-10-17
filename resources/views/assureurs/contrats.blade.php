@extends('layouts.assureur')

@section('content')
    <div class="breadcrumb-custom mb-3">
        <h4 class="pt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="#" class="breadcrumb-link1">Gestion des contrats</a>
        </h4>
    </div>
    <div class="container-fluid p-4">
        <!-- Formulaire de recherche -->


        <!-- Formulaire de filtre -->
        <form class="row g-3 align-items-end mb-4">
            <div class="col-md-3">
                <label class="form-label">Type Contrat :</label>
                <select class="form-select shadowInput" id="filterType">
                    <option value="">Tous</option>
                    @if (isset($contrats))
                    @foreach (array_unique(array_column($contrats, 'type_contrat')) as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Statut :</label>
                <select class="form-select shadowInput" id="filterStatut">
                    <option value="">Tous</option>
                    @if (isset($contrats))
                        
                    @foreach (array_unique(array_column($contrats, 'statut')) as $statut)
                        <option value="{{ $statut }}">{{ $statut }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Souscripteur :</label>
                <input type="text" class="form-control shadowInput" id="filterSouscripteur" placeholder="Ex: SETRAG">
            </div>
        </form>

        <!-- Tableau -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle" id="contractsTable">
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
                <tbody id="tableBody">
                    @if (isset($contrats))
                    @foreach ($contrats as $contrat)
                        <tr>
                            <td class="textPrimary fw-semibold">
                                {{ isset($contrat['statut']) ? $contrat['statut'] : '------' }}
                            </td>

                            <td>
                                {{ isset($contrat['code_contrat']) ? $contrat['code_contrat'] : '------' }}
                            </td>

                            <td>
                                {{ isset($contrat['numero_contrat']) ? $contrat['numero_contrat'] : '------' }}
                            </td>

                            <td>
                                {{ isset($contrat['type_contrat']) ? $contrat['type_contrat'] : '------' }}
                            </td>

                            <td>
                                {{ isset($contrat['nom_souscripteur']) ? $contrat['nom_souscripteur'] : '------' }}
                            </td>

                            <td>
                                @if (!empty($contrat['date_souscription']))
                                    {{ \Carbon\Carbon::parse($contrat['date_souscription'])->format('d/m/Y') }}
                                @else
                                    ------
                                @endif
                            </td>

                            <td>
                                @if (!empty($contrat['date_echeance']))
                                    {{ \Carbon\Carbon::parse($contrat['date_echeance'])->format('d/m/Y') }}
                                @else
                                    ------
                                @endif
                            </td>

                            <td>
                                {{ isset($contrat['description']) && $contrat['description'] !== '' ? $contrat['description'] : '------' }}
                            </td>

                            <td>
                                <a href="{{ route('assureur.contratsDetails', ['contrat' => $contrat['id']]) }}"
                                    class="btn btn-sm" style="background-color: #5e2d17; color: white;">
                                    Détails
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <script>
            const rows = document.querySelectorAll("#contractsTable tbody tr");

            function filterTable() {
                const type = document.getElementById("filterType").value.toLowerCase();
                const statut = document.getElementById("filterStatut").value.toLowerCase();
                const souscripteur = document.getElementById("filterSouscripteur").value.toLowerCase();

                rows.forEach(row => {
                    const rowType = row.cells[3].textContent.toLowerCase();
                    const rowStatut = row.cells[0].textContent.toLowerCase();
                    const rowSouscripteur = row.cells[4].textContent.toLowerCase();

                    const matches =
                        (type === "" || rowType.includes(type)) &&
                        (statut === "" || rowStatut.includes(statut)) &&
                        (souscripteur === "" || rowSouscripteur.includes(souscripteur));

                    row.style.display = matches ? "" : "none";
                });
            }

            document.getElementById("filterType").addEventListener("input", filterTable);
            document.getElementById("filterStatut").addEventListener("input", filterTable);
            document.getElementById("filterSouscripteur").addEventListener("keyup", filterTable);
        </script>

    </div>
@endsection
