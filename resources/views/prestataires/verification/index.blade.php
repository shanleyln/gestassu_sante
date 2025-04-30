@extends('layouts.prestataire')

@section('title', 'Vérification carte')

@section('content')
    <div class="container my-5">
        <h4 class="text-secondary text-center mb-4">Voici les informations d'un Bénéficiaire</h4>

        <!-- Barre de recherche -->
        <form class="d-flex justify-content-center align-items-center flex-wrap gap-2 search-form-simple mb-4">
            <input type="text" class="form-control search-input-simple" placeholder="Rechercher par identifiant...">
            <button type="submit" class="btn btn-search-simple">
                <i class="bi bi-search me-1"></i> Rechercher
            </button>
        </form>

        <!-- Onglets -->
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
                        <img src="data:image/jpeg;base64,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"
                            alt="Photo" class="img-thumbnail rounded-circle mb-3"
                            style="width: 200px; height: 200px; object-fit: cover;">


                    </div>

                    <!-- Infos principales à droite -->
                    <div class="flex-fill">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Matricule:</strong> MAT-12345</p>
                                <p><strong>Nom et prénoms:</strong> Dupont Jean</p>
                                <p><strong>Type Bénéficiaire:</strong> <span class="badge bg-success">Principal</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Numéro Sécurité Sociale:</strong> 1234567890</p>
                                <p><strong>Date de naissance:</strong> 01/01/1980</p>
                                <p><strong>Genre:</strong> Masculin</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Pays:</strong> France</p>
                                <p><strong>Ville:</strong> Paris</p>
                                <p><strong>Code Postal:</strong> 75000</p>
                                <p><strong>Adresse:</strong> 123 Rue des Lilas</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Profession:</strong> Ingénieur</p>
                                <p><strong>Email:</strong> jean.dupont@example.com</p>
                                <p><strong>Téléphone:</strong> +33 1 23 45 67 89</p>
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
                                <tr>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Onglet Couverture -->
            <div class="tab-pane fade" id="coverage" role="tabpanel">
                <h5 class="mb-3"><i class="bi bi-file-text me-1"></i>Contrat</h5>
                <div class="row ">
                    <div class="col-md-4">
                        <p><strong>Numéro:</strong> CON-0001</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Date effet:</strong> 01/01/2024</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Date échéance:</strong> 31/12/2024</p>
                    </div>
                </div>

                <h5 class="mb-3"><i class="bi bi-shield me-1"></i>Police</h5>
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Numéro:</strong> POL-0001</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Garanties:</strong> Santé, Hospitalisation, Maternité</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Plafond:</strong> 100 000 €</p>
                    </div>
                </div>

                <h5 class="mb-3"><i class="bi bi-info-circle me-1"></i>Conditions</h5>
                <ul>
                    <li>Remboursement : 80%</li>
                    <li>Franchise : 10%</li>
                    <li>Délai d'attente : 30 jours</li>
                </ul>
            </div>
        </div>
    </div>

    <style>
        :root {
            --main-color: #5c402b;
            --secondary-color: #e7dfd7;
            --hover-color: #7a5e44;
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
            max-width: 400px;
        }

        .btn-search-simple {
            background: var(--main-color);
            color: #fff;
            padding: .75rem 1.5rem;
            border-radius: .375rem;
            font-weight: 500;
            transition: .3s ease;
        }

        .btn-search-simple:hover {
            background: var(--hover-color);
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
@endsection
