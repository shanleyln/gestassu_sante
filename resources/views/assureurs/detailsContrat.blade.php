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
                    <p class="textPrimary"><strong>N° Contrat :</strong> {{ $contrat['numero'] ?? '------' }}</p>
                    <p class="textPrimary"><strong>Souscripteur :</strong> {{ $contrat['nom_souscripteur'] ?? '------' }}
                    </p>
                    <p class="textPrimary"><strong>Date échéance :</strong>
                        {{ !empty($contrat['date_echeance']) ? \Carbon\Carbon::parse($contrat['date_echeance'])->format('d/m/Y') : '------' }}
                    </p>
                </div>

                <!-- Statistiques -->
                <div class="bg-light border rounded shadow-sm p-3">
                    <h6 class="text-white px-3 py-2 mb-3 rounded" style="background-color: #5e2d17;">Statistiques</h6>
                    <div class="row text-center">
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small class="">Total police</small><br>
                                <strong>{{ $statistiques['total_police'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small>Total bénéf.</small><br>
                                <strong>{{ $statistiques['total_beneficiaires'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small>Principaux</small><br>
                                <strong>{{ $statistiques['total_assures_principaux'] ?? 0 }}</strong>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 mb-2">
                            <div class="textPrimary border rounded py-2 bg-white">
                                <small>Affiliés</small><br>
                                <strong>{{ $statistiques['total_affilies'] ?? 0 }}</strong>
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
                    <table class="table table-bordered text-center align-middle" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th style="background-color: #5e2d17; color: white;">N° Police</th>
                                <th style="background-color: #5e2d17; color: white;">Type personnel</th>
                                <th style="background-color: #5e2d17; color: white;">Description</th>
                                <th style="background-color: #5e2d17; color: white;">Condition particuliere</th>
                                <th style="background-color: #5e2d17; color: white;">Date début</th>
                                <th style="background-color: #5e2d17; color: white;">Date fin</th>
                                <th style="background-color: #5e2d17; color: white;">Tarif</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($polices as $police)
                                <tr>
                                    <td>{{ $police['Numero_Police'] ?? '-' }}</td>
                                    <td>{{ $police['TypePersonnel'] ?? '-' }}</td>
                                    <td>{{ $police['description'] ?? '-' }}</td>
                                    <td>
                                        <a href="{{ $police['ConditionsParticulieres'] }}" target="_blank" class="btn" style="background-color: #5e2d17;color: white;font-size: 13px;">
                                            <i class="bi bi-download"></i> Télécharger
                                        </a>
                                    </td>
                                    <td>
                                        {{ !empty($police['date_debut']) ? \Carbon\Carbon::parse($police['date_debut'])->format('d/m/Y') : '------' }}
                                    </td>
                                    <td>
                                        {{ !empty($police['date_fin']) ? \Carbon\Carbon::parse($police['date_fin'])->format('d/m/Y') : '------' }}
                                    </td>
                                    <td>{{ $police['Tarif'] ?? 0 }}</td>
                                    <td>
                                        <a href="{{ route('assureur.policeDetails', ['police' => $police['id']]) }}"
                                            class="btn" style="background-color: #5e2d17;color: white;font-size: 13px;">Détails police</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr id="noResultMessage" class="d-none">
                                <td colspan="8" class="text-center text-muted">Aucun résultat trouvé.</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.querySelector('input[placeholder="Rechercher..."]');
        const dateInputs = document.querySelectorAll('input[type="date"]');
        const rows = document.querySelectorAll("table tbody tr");
        const noResultRow = document.getElementById("noResultMessage");

        function parseDate(str) {
            if (!str || str === '------') return null;
            const [d, m, y] = str.split("/");
            return new Date(`${y}-${m}-${d}`);
        }

        function filterTable() {
            const searchValue = searchInput.value.toLowerCase();
            const dateDebut = parseDate(dateInputs[0].valueAsDate?.toLocaleDateString('fr-CA'));
            const dateFin = parseDate(dateInputs[1].valueAsDate?.toLocaleDateString('fr-CA'));

            let visibleCount = 0;

            rows.forEach(row => {
                const nom = row.cells[1].textContent.toLowerCase();
                const type = row.cells[2].textContent.toLowerCase();
                const desc = row.cells[3].textContent.toLowerCase();
                const debut = parseDate(row.cells[4].textContent);
                const fin = parseDate(row.cells[5].textContent);

                const matchText = nom.includes(searchValue) || type.includes(searchValue) || desc.includes(searchValue);
                const matchDate = (!dateDebut || (debut && debut >= dateDebut)) &&
                                  (!dateFin || (fin && fin <= dateFin));

                const match = matchText && matchDate;

                row.style.display = match ? "" : "none";
                if (match) visibleCount++;
            });

            noResultRow.classList.toggle("d-none", visibleCount > 0);
        }

        searchInput.addEventListener("input", filterTable);
        dateInputs.forEach(input => input.addEventListener("change", filterTable));
    });
</script>

@endsection
