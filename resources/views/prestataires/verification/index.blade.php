@extends('layouts.prestataire')

@section('content')
    <div class="breadcrumb-custom mb-3">
        <h4 class="mt-2">
            <i class="bi bi-chevron-right breadcrumb-chevron"></i>
            <a href="#" class="breadcrumb-link1">Vérification carte</a>
        </h4>
    </div>
    <div class="container-fluid mb-3 bg-white card-body shadow p-4 rounded">

        @if ($errors->any())
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>
                            <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
                            {{ $errors->first() }}
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        @endif
        @if (isset($userData))
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4
                    d-flex justify-content-center align-items-center">
                    <div class="alert alert-success">
                        <strong> <i class="bi bi-check-circle-fill me-2 text-success"></i>
                            Bénéficiaire trouvé avec succès !
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        @endif
        @if (isset($userInvalid))
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4
                    d-flex justify-content-center align-items-center">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>
                            <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
                            Aucun bénéficiaire trouvé, merci de vérifier le code saisi.
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        @endif
        <!-- Barre de recherche -->
        <form method="POST" action="{{ route('identifiantBeneficiaire') }}"
            class="d-flex justify-content-center align-items-center flex-wrap gap-2 mb-4">
            @csrf
            <input type="text" class="form-control search-input-simple shadow" name="matricule"
                value="{{ old('matricule') }}" placeholder="Rechercher par code (ex : ABCD-1)" id="matriculeInput"
                data-mask="AAAA-0" title="Le format doit être ABCD-1" required autocomplete="off"
                style="text-transform: uppercase;">


            <button type="submit" class="btn btn-search-simple shadow">
                <i class="bi bi-search me-1"></i> Rechercher
            </button>
        </form>

        <!-- Onglets -->
        @if (isset($userData))
            <h4 class="text-secondary text-left mb-2">Informations du bénéficiaire</h4>
        @endif

        <ul class="nav nav-tabs justify-content-center" id="infoTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="beneficiary-tab" data-bs-toggle="tab" data-bs-target="#beneficiary"
                    type="button" role="tab">
                    <i class="bi bi-person me-1"></i> Bénéficiaire
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="coverage-tab" data-bs-toggle="tab" data-bs-target="#coverage" type="button"
                    role="tab">
                    <i class="bi bi-shield-check me-1"></i> Couverture
                </button>
            </li>
        </ul>

        <div class="tab-content py-4" id="infoTabsContent">
            <!-- Onglet Bénéficiaire -->
            <div class="tab-pane fade show active" id="beneficiary" role="tabpanel">
                <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
                    <!-- Photo à gauche -->
                    <div class="text-center">
                        <img src="{{ $userData['beneficiaire']['image'] ?? 'https://img.freepik.com/vecteurs-premium/illustration-vectorielle-plate-echelle-gris-avatar-profil-utilisateur-icone-personne-image-profil-silhouette-neutre-genre-convient-pour-profils-medias-sociaux-icones-economiseurs-ecran-comme-modelex9xa_719432-2210.jpg?ga=GA1.1.336133476.1744805944&semt=ais_hybrid&w=740' }}"
                            alt="Photo" class="img-thumbnail rounded-circle mb-3"
                            style="width: 200px; height: 200px; object-fit: cover;">
                    </div>

                    <!-- Infos principales à droite -->
                    <div class="flex-fill">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Matricule :</strong>
                                    {{ $userData['beneficiaire']['matricule'] ?? '--/--/----/--/----/----/-' }}</p>
                                <p><strong>Nom et prénoms :</strong> {{ $userData['beneficiaire']['nom'] ?? '----------' }}
                                    {{ $userData['beneficiaire']['prenom'] ?? '----------' }}</p>
                                <p><strong>Type Bénéficiaire :</strong> <span
                                        class="badge bg-dark">{{ $userData['beneficiaire']['lien'] ?? '----------' }}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Numéro Sécurité Sociale :</strong>
                                    {{ $userData['beneficiaire']['numero_securite_sociale'] ?? '----------' }}</p>
                                <p><strong>Date de naissance :</strong>
                                    {{ isset($userData['beneficiaire']['date_naissance']) ? \App\Helpers\Formatage::convertirDateEnTexte(\Carbon\Carbon::createFromFormat('Ymd', $userData['beneficiaire']['date_naissance'])->format('d/m/Y')) : '---------' }}
                                </p>
                                <p><strong>Genre :</strong> {{ $userData['beneficiaire']['genre'] ?? '------' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Pays :</strong> {{ $userData['beneficiaire']['nom_pays'] ?? '------' }}</p>
                                <p><strong>Ville :</strong> {{ $userData['beneficiaire']['nom_ville'] ?? '------' }}</p>
                                <p><strong>Code Postal :</strong>
                                    {{ $userData['beneficiaire']['code_postal'] ?? '------' }}</p>
                                <p><strong>Adresse :</strong> {{ $userData['beneficiaire']['nom_rue'] ?? '------' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Profession :</strong> {{ $userData['beneficiaire']['profession'] ?? '------' }}
                                </p>
                                <p><strong>Email :</strong>
                                    {{ $userData['beneficiaire']['email'] ?? '---------@gmail.com' }}</p>
                                <p><strong>Téléphone :</strong>
                                    {{ $userData['beneficiaire']['telephone'] ?? '+-- --- -- -- --' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Si affilié: afficher son bénéficiaire principal -->
                {{--
            <div class="mt-4">
                <h5>Bénéficiaire Principal</h5>
                <p><strong>Nom:</strong> Dupont Jean</p>
                <p><strong>Lien d'affiliation:</strong> Père</p>
            </div>
            --}}

                <!-- Si Principal: afficher les bénéficiaires affiliés -->
                <div class="mt-5">
                    <h5>Bénéficiaires Affiliés</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Photo</th>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date naissance</th>
                                    <th>Lien d'affiliation</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTU9-dxlLEMm64RJgb8mdf8g2VvDPQEWQLL6A&s"
                                            alt="Photo" class="rounded-circle"
                                            style="width:40px;height:40px;object-fit:cover;"></td>
                                    <td>AFF-12345</td>
                                    <td>Dupont</td>
                                    <td>Marie</td>
                                    <td>01/01/2005</td>
                                    <td>Fille</td>
                                </tr>
                                <tr>
                                    <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnm5lZ7_m4O_0MZCness276ddO0qFIAuCsRw&s"
                                            alt="Photo" class="rounded-circle"
                                            style="width:40px;height:40px;object-fit:cover;"></td>
                                    <td>AFF-12346</td>
                                    <td>Dupont</td>
                                    <td>Pierre</td>
                                    <td>01/01/2008</td>
                                    <td>Fils</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Onglet Couverture -->
            <div class="tab-pane fade" id="coverage" role="tabpanel">
                @php
                    $contrat = $userData['contrat'] ?? [];
                    $police = $userData['police'] ?? [];
                    $garanties = $userData['garanties'] ?? [];
                @endphp

                <div class="row">
                    {{-- CONTRAT --}}
                    <div class="col-md-4">
                        <h5 class="mb-3">
                            <span class="border border-dark py-2 px-4 rounded">
                                <i class="bi bi-file-text me-1"></i>Contrat
                            </span>
                        </h5>
                        <p><strong>Numéro :</strong> {{ $contrat['numero'] ?? '---------' }}</p>
                        <p><strong>Type :</strong> {{ $contrat['type'] ?? '---------' }}</p>
                        <p><strong>Date effet :</strong>
                            {{ isset($contrat['date_souscription']) ? \App\Helpers\Formatage::convertirDateEnTexte(\Carbon\Carbon::createFromFormat('Ymd', $contrat['date_souscription'])->format('d/m/Y')) : '---------' }}
                        </p>
                        <p><strong>Date échéance :</strong>
                            {{ isset($contrat['date_echeance']) ? \App\Helpers\Formatage::convertirDateEnTexte(\Carbon\Carbon::createFromFormat('Ymd', $contrat['date_echeance'])->format('d/m/Y')) : '---------' }}
                        </p>
                    </div>

                    {{-- POLICE --}}
                    <div class="col-md-4">
                        <h5 class="mb-3">
                            <span class="border border-dark py-2 px-4 rounded">
                                <i class="bi bi-shield me-1"></i>Police
                            </span>
                        </h5>
                        <p><strong>Nom :</strong> {{ $police['nom'] ?? '---------' }}</p>
                        <p><strong>Numéro :</strong> {{ $police['numero'] ?? '---------' }}</p>
                        <p><strong>Type :</strong> {{ $police['type'] ?? '---------' }}</p>
                        <p><strong>Date début :</strong>
                            {{ isset($police['date_debut']) ? \App\Helpers\Formatage::convertirDateEnTexte(\Carbon\Carbon::createFromFormat('Ymd', $police['date_debut'])->format('d/m/Y')) : '---------' }}
                        </p>
                        <p><strong>Date échéance :</strong>
                            {{ isset($police['date_fin']) ? \App\Helpers\Formatage::convertirDateEnTexte(\Carbon\Carbon::createFromFormat('Ymd', $police['date_fin'])->format('d/m/Y')) : '---------' }}
                        </p>
                        <p><strong>Garanties :</strong>
                            @if (!empty($garanties))
                                {{ implode(', ', array_column($garanties, 'nom')) }}
                            @else
                                ---------
                            @endif
                        </p>

                        <p><strong>Plafond:</strong>
                            {{ count($garanties)
                                ? number_format(array_sum(array_column($garanties, 'plafond_annuel')), 0, ',', ' ') . ' FCFA'
                                : '---------' }}
                        </p>
                    </div>

                    {{-- CONDITIONS --}}
                    <div class="col-md-4">
                        <h5 class="mb-3">
                            <span class="border border-dark py-2 px-4 rounded">
                                <i class="bi bi-info-circle me-1"></i>Conditions
                            </span>
                        </h5>
                        <ul>
                            @if (!empty($garanties))
                                @foreach ($garanties as $g)
                                    <li>
                                        <strong>{{ $g['nom'] ?? 'Garantie' }} :</strong>
                                        {{ isset($g['taux_remboursement']) ? round($g['taux_remboursement'] * 100) . ' %' : '---' }}
                                    </li>
                                    <li><strong>Plafond annuel :</strong>
                                        {{ isset($g['plafond_annuel']) ? number_format($g['plafond_annuel'], 0, ',', ' ') : '--------' }}
                                    </li>
                                @endforeach
                            @else
                                <li>Remboursement : ---------</li>
                                <li><strong>Plafond annuel :</strong> --------</li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        :root {
            --main-color: #5e2d17;
            --secondary-color: #e7dfd7;
            --hover-color: #5e2d17;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        .search-form-simple {
            background: #fff;
            border-radius: .5rem;
            box-shadow: 0 2px 8px var(--shadow-color);
            padding: 1rem;
        }

        .search-input-simple {
            border: 1px solid var(--secondary-color);
            border-radius: .375rem;
            padding: .75rem;
            flex: 1;
            max-width: 600px;
        }

        .btn-search-simple {
            background: var(--main-color);
            color: #fff;
            padding: .75rem 1.5rem;
            border-radius: .375rem;
            font-weight: 700;
            transition: .3s ease;
        }

        .btn-search-simple:hover {
            background: var(--hover-color);
            /* color: #fff; */
        }

        .nav-tabs .nav-link {
            font-weight: 500;
            border: none;
            border-radius: .375rem;
            color: var(--main-color);
        }

        .nav-tabs .nav-link.active {
            background: var(--main-color);
            color: #fff;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#matriculeInput').mask('AAAA-0');
        });
    </script>

@endsection
