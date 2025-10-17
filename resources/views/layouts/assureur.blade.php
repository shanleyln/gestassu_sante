<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Espace Assureur')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Ajoute dans le <head> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('imgs/icon_logo.PNG') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('imgs/icon_logo.PNG') }}" type="image/x-icon">

    <style>
        .navbar-brown {
            background-color: #5e2d17 !important;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
        }

        .navbar {
            min-height: 56px;
        }

        body {
            padding-top: 60px;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            background: #fff !important;
            border-radius: 5px;
            box-shadow: 0 2px 12px 0 rgba(139, 92, 45, 0.07);
            min-height: 92vh;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 6px;
            margin-right: 6px;
            position: fixed;
            top: 50px;
            left: 0;
            height: calc(100vh - 56px);
            overflow-y: auto;
            z-index: 1025;
            width: 250px;
        }

        .sidebar .nav-link {
            color: #444 !important;
            font-size: 0.98rem;
            padding: 0.50rem 0.9rem;
            border-radius: 5px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            transition: background 0.18s, color 0.18s, box-shadow 0.18s;
        }

        .sidebar .nav-link i,
        .sidebar .nav-link svg {
            font-size: 1.05rem;
            margin-right: 0.55rem;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:focus,
        .sidebar .nav-link:hover {
            color: #fff !important;
            background: #5e2d17 !important;
            font-weight: bold;
            margin-left: 7px;
            margin-right: 7px;
            box-shadow: 0 2px 8px 0 rgba(139, 92, 45, 0.09);
        }

        .sidebar .nav-link.active {
            box-shadow: 0 4px 16px 0 rgba(139, 92, 45, 0.13);
        }

        .sidebar .nav-link {
            text-decoration: none !important;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100px;
            }
        }

        @media (max-width: 767.98px) {
            .sidebar {
                position: static;
                width: 100%;
                margin-left: 5px;
                border-radius: 0;
            }
        }

        .container-fluid>.row {
            margin-left: 0;
        }

        /* Scrollbar design for sidebar */
        .sidebar {
            scrollbar-width: thin;
            scrollbar-color: #5e2d17 #f5f5f5;
        }

        .sidebar::-webkit-scrollbar {
            width: 7px;
            background: #f5f5f5;
            border-radius: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #5e2d17;
            border-radius: 9px;
            min-height: 40px;
            transition: background 0.2s;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #5e2d17;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f5f5f5;
            border-radius: 9px;
        }

        .textPrimary {
            color: #5e2d17;
        }

        .bgPrimary {
            background-color: #5e2d17;
            color: white;
        }



        .shadowInput {
            box-shadow: none !important;
            border: 1px solid #5e2d17;
            /* Couleur neutre */
            outline: none;
            transition: none;
        }

        .shadowInput:focus {
            box-shadow: none !important;
            border-color: #5e2d17 !important;
            outline: none !important;
        }
    </style>
    <style>
        .breadcrumb-custom {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .breadcrumb-link {
            color: #5e2d17;
            text-decoration: underline;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: transform 0.2s ease, color 0.2s ease;
            text-decoration: none;
        }

        .breadcrumb-link1 {
            color: #5e2e17d7;
            text-decoration: underline;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            text-decoration: none;
        }

        .breadcrumb-link:hover {
            transform: scale(1.08);
            color: #3e1b0f;
        }

        .breadcrumb-chevron {
            color: #5e2d17;
            font-size: 1rem;
        }
    </style>
</head>

<body style="background-color: #ccc;">

    <!-- Header -->
    <nav class="navbar navbar-dark navbar-brown px-3 flex justify-content-between">
        <a class="navbar-brand" href="#">
            Espace Assureur :
            <strong
                style="color: #f8f9fa">{{ \Illuminate\Support\Facades\Auth::guard('api_user')->user()->nomassureure }}</strong>
        </a>
        <div class="">
            <a class="navbar-brand" href="#" style="margin-right: 20px">
                <i class="bi bi-person-circle"></i>
                {{ \Illuminate\Support\Facades\Auth::guard('api_user')->user()->nom }}
                {{ \Illuminate\Support\Facades\Auth::guard('api_user')->user()->prenom }}
            </a>
            <a href="{{ route('guide_connexion') }}"
                class="btn {{ request()->routeIs('guide_connexion') ? 'btn-light' : 'btn-outline-light' }}">
                <i class="bi bi-journal-medical me-2"></i> Guide Santé
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end py-4 shadow-sm"
                style="padding-right:0;padding-left:0;">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('assureur.actualite') ? ' active' : '' }}"
                                href="{{ route('assureur.actualite') }}"><strong><i
                                        class="bi bi-house-door-fill"></i>Acceuil</strong></a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('assureur.dashboard') ? ' active' : '' }}"
                                href="{{ route('assureur.dashboard') }}"><strong><i
                                        class="bi bi-speedometer2 me-2"></i>Tableau
                                    de bord</strong></a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('assureur.contrats', 'assureur.contratsDetails', 'assureur.policeDetails') ? ' active' : '' }}"
                                href="{{ route('assureur.contrats') }}"><strong><i
                                        class="bi bi-file-earmark-text me-2"></i>Contrats</strong></a></li>
                        <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal"
                                data-bs-target="#beneficiaireModal">
                                <strong><i class="bi bi-people me-2"></i>Assurés</strong></a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-wallet2 me-2"></i>Primes & Cotisations</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-exclamation-triangle me-2"></i>Sinistres</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-hospital me-2"></i>Prestataires</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-envelope-open me-2"></i>Prises en charge</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-bar-chart-line me-2"></i>Reporting</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-folder2-open me-2"></i>Documents</a></li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-danger fw-bold d-flex align-items-center"
                                href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 py-4">
                @yield('content')
            </main>

        </div>
        @php
            $dataPhysique = \App\Helpers\ListeAssurer::assurer_physique();
            $result = \App\Helpers\ListeAssurer::assurer_moral();
            $dataMorale = $result['dataMorale'];
            $dataFocaux = $result['dataFocaux'];
        @endphp
        <div class="modal fade" id="beneficiaireModal" tabindex="-1" aria-labelledby="beneficiaireModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" style="padding: 30px">
                <div class="modal-content">
                    <div class="modal-header bgPrimary text-white">
                        <h5 class="modal-title" id="beneficiaireModalLabel">Liste des assurés</h5>
                        <button type="button" class="btn-close btn-close-white bg-light rounded p-3"
                            data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <style>
                            .input-search-style {
                                border: 0.5px solid #ccc;
                                border-radius: 5px;
                                box-shadow: 0 7px 10px rgba(0, 0, 0, 0.1);
                                transition: all 0.2s ease-in-out;
                            }

                            .input-search-style:focus {
                                border-color: #5e2d17;
                                box-shadow: 0 0 0 0.2rem rgba(94, 45, 23, 0.25);
                            }
                        </style>
                        <!-- Barre de recherche -->
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="input-search-style form-control"
                                        placeholder="Tapez une recherche pour afficher un assuré...">
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>

                        <!-- Nav tabs -->
                        <style>
                            .nav-tabs .nav-link {
                                color: #5e2d17;
                                border: 1px solid #5e2d17;
                                background-color: white;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            }

                            .nav-tabs .nav-link:hover {
                                background-color: #f0e6e2;
                                color: #5e2d17;
                            }

                            .nav-tabs .nav-link.active {
                                background-color: #5e2d17;
                                color: white;
                                font-weight: bold;
                                border-color: #5e2d17 #5e2d17 #fff;
                            }

                            .nav-tabs {
                                border-bottom: 2px solid #5e2d17;
                            }
                        </style>

                        <ul class="nav nav-tabs mb-4" id="beneficiaireTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="physique-tab" data-bs-toggle="tab"
                                    data-bs-target="#physique-pane" type="button" role="tab"
                                    aria-controls="physique-pane" aria-selected="true">
                                    Personne physique
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="morale-tab" data-bs-toggle="tab"
                                    data-bs-target="#morale-pane" type="button" role="tab"
                                    aria-controls="morale-pane" aria-selected="false">
                                    Personne morale
                                </button>
                            </li>
                        </ul>


                        <div class="tab-content mb-3">
                            <div class="tab-pane fade show active" id="physique-pane" role="tabpanel"
                                aria-labelledby="physique-tab">
                                <div id="physiqueTableBodyContainer">
                                    <h3 class="textPrimary">Personne physique</h3>
                                    <table class="table table-bordered table-hover text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th style="background-color: #5e2d17; color: white;">Photo</th>
                                                <th style="background-color: #5e2d17; color: white;">Nom(s)</th>
                                                <th style="background-color: #5e2d17; color: white;">Prénom(s)</th>
                                                <th style="background-color: #5e2d17; color: white;">Genre</th>
                                                <th style="background-color: #5e2d17; color: white;">Date de naissance
                                                </th>
                                                <th style="background-color: #5e2d17; color: white;">Profession</th>
                                                <th style="background-color: #5e2d17; color: white;">Téléphone</th>
                                                <th style="background-color: #5e2d17; color: white;">Email</th>
                                                <th style="background-color: #5e2d17; color: white;">N° Rue</th>
                                                <th style="background-color: #5e2d17; color: white;">Nom Rue</th>
                                                <th style="background-color: #5e2d17; color: white;">Pays</th>
                                                <th style="background-color: #5e2d17; color: white;">Ville</th>
                                                <th style="background-color: #5e2d17; color: white;">Code postal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="physiqueTableBody" class="d-none"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="morale-pane" role="tabpanel"
                                aria-labelledby="morale-tab">
                                <div id="moralTableBodyContainer">
                                    <h3 class="textPrimary">Personne morale</h3>
                                    <table class="table table-bordered table-hover text-center align-middle" style="margin-bottom: 150px;">
                                        <thead>
                                            <tr>
                                                <th style="background-color: #5e2d17; color: white;">Logo
                                                </th>
                                                <th style="background-color: #5e2d17; color: white;">Raison sociale
                                                </th>
                                                <th style="background-color: #5e2d17; color: white;">Numéro SIRET</th>
                                                <th style="background-color: #5e2d17; color: white;">Type prestataire
                                                </th>
                                                <th style="background-color: #5e2d17; color: white;">Email</th>
                                                <th style="background-color: #5e2d17; color: white;">Téléphone</th>
                                                <th style="background-color: #5e2d17; color: white;">N° Rue</th>
                                                <th style="background-color: #5e2d17; color: white;">Nom Rue</th>
                                                <th style="background-color: #5e2d17; color: white;">Code postal</th>
                                                <th style="background-color: #5e2d17; color: white;">Pays</th>
                                                <th style="background-color: #5e2d17; color: white;">Ville</th>
                                                <th style="background-color: #5e2d17; color: white;">Code Prestataire
                                                </th>
                                                <th style="background-color: #5e2d17; color: white;">En convention</th>
                                            </tr>
                                        </thead>
                                        <tbody id="moralTableBody" class="d-none"></tbody>

                                    </table>
                                </div>
                                <div id="focauxBodyContainer" >
                                    <h3 class="textPrimary">Points focaux</h3>
                                    <table class="table table-bordered table-hover text-center align-middle">
                                        <thead>
                                            <thead>
                                                <tr>
                                                    <th style="background-color: #5e2d17; color: white;">Nom</th>
                                                    <th style="background-color: #5e2d17; color: white;">Prénoms</th>
                                                    <th style="background-color: #5e2d17; color: white;">Genre</th>
                                                    <th style="background-color: #5e2d17; color: white;">N° Sécurité
                                                        Soc.</th>
                                                    <th style="background-color: #5e2d17; color: white;">Profession
                                                    </th>
                                                    <th style="background-color: #5e2d17; color: white;">Date Naiss.
                                                    </th>
                                                    <th style="background-color: #5e2d17; color: white;">Téléphone</th>
                                                    <th style="background-color: #5e2d17; color: white;">Email</th>
                                                    <th style="background-color: #5e2d17; color: white;">N° Rue</th>
                                                    <th style="background-color: #5e2d17; color: white;">Nom rue</th>
                                                    <th style="background-color: #5e2d17; color: white;">Code postal
                                                    </th>
                                                    <th style="background-color: #5e2d17; color: white;">Pays</th>
                                                    <th style="background-color: #5e2d17; color: white;">Ville</th>
                                                </tr>
                                            </thead>
                                        </thead>
                                        <tbody id="focauxBody" class="d-none"></tbody>
                                        <tfoot class="d-none" id="focauxTableFooter">
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Message si aucune recherche -->
                        <div id="messageAucun" class="text-center textPrimary py-5" style="font-size: 20px">
                            Tapez une recherche pour afficher un ou plusieurs assuré(s).
                        </div>
                        <div id="messageAucunResultat" class="text-center text-danger py-3 d-none">
                            Aucun résultat trouvé pour votre recherche.
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        const dataMorale = @json($dataMorale);
        const dataFocaux = @json($dataFocaux);
        const dataPhysique = @json($dataPhysique);


        const input = document.getElementById('searchInput');
        const physiqueTableBody = document.getElementById('physiqueTableBody');
        const physiqueContainer = document.getElementById('physiqueTableBodyContainer');
        const moralTableBody = document.getElementById('moralTableBody');
        const moralContainer = document.getElementById('moralTableBodyContainer');
        const physiqueTab = document.getElementById('physique-tab');
        const moraleTab = document.getElementById('morale-tab');
        const navItemPhysique = physiqueTab.parentElement;
        const navItemMorale = moraleTab.parentElement;
        const messageInitial = document.getElementById('messageAucun');
        const messageAucunResultat = document.getElementById('messageAucunResultat');

        function formatPhoneNumber(phone) {
            let num = phone.replace(/\D/g, ''); // Supprime tous les caractères sauf chiffres

            // Gérer indicatif Gabon
            if (num.startsWith('00241')) {
                num = num.slice(5);
            } else if (num.startsWith('241')) {
                num = num.slice(3);
            }

            // Formater le numéro selon sa longueur (Gabon)
            if (num.length === 8) {
                // Format standard Gabon: 2 2 2 2
                return '+241 ' + num.slice(0, 2) + ' ' + num.slice(2, 4) + ' ' + num.slice(4, 6) + ' ' + num.slice(6, 8);
            } else if (num.length === 9) {
                // Format 3 2 2 2 (rare, mais possible)
                return '+241 ' + num.slice(0, 3) + ' ' + num.slice(3, 5) + ' ' + num.slice(5, 7) + ' ' + num.slice(7, 9);
            } else if (num.length === 7) {
                // Format 2 2 3
                return '+241 ' + num.slice(0, 2) + ' ' + num.slice(2, 4) + ' ' + num.slice(4, 7);
            } else {
                return phone; // Retour brut si format inconnu
            }
        }

        function formatDateNaissance(rawDate) {
            if (!rawDate || rawDate.length !== 8) return rawDate;

            const jours = rawDate.slice(6, 8);
            const mois = parseInt(rawDate.slice(4, 6), 10);
            const annee = rawDate.slice(0, 4);

            const moisNoms = [
                'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
                'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
            ];

            if (mois < 1 || mois > 12) return rawDate;

            return `${jours} ${moisNoms[mois - 1]} ${annee}`;
        }


        input.addEventListener('input', () => {
            const query = input.value.toLowerCase().trim();

            physiqueTableBody.innerHTML = '';
            moralTableBody.innerHTML = '';

            if (query === '') {
                physiqueTableBody.classList.add('d-none');
                moralTableBody.classList.add('d-none');
                navItemPhysique.classList.remove('d-none');
                navItemMorale.classList.remove('d-none');
                messageInitial.classList.remove('d-none');
                if (messageAucunResultat) messageAucunResultat.classList.add('d-none');
                return;
            }

            const resultsPhysique = dataPhysique.filter(item =>
                Object.values(item).some(val => String(val).toLowerCase().includes(query))
            );

            const resultsMorale = dataMorale.filter(item =>
                Object.values(item).some(val => String(val).toLowerCase().includes(query))
            );

            navItemPhysique.classList.toggle('d-none', resultsPhysique.length === 0);
            navItemMorale.classList.toggle('d-none', resultsMorale.length === 0);

            if (resultsPhysique.length > 0) {
                physiqueTab.click();
            } else if (resultsMorale.length > 0) {
                moraleTab.click();
            }

            if (resultsPhysique.length > 0) {
                physiqueTableBody.classList.remove('d-none');
                resultsPhysique.forEach(item => {
                    const formattedTel = formatPhoneNumber(item.telephone);
                    const formattedDate = formatDateNaissance(item.date_naissance);
                    physiqueTableBody.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>
                        <img src="${item.photo_profil && item.photo_profil !== '' && item.photo_profil !== null 
                            ? item.photo_profil 
                            : 'https://img.freepik.com/vecteurs-premium/icone-profil-utilisateur-dans-style-plat-illustration-vectorielle-avatar-membre-fond-isole-concept-entreprise-signe-autorisation-humaine_157943-15752.jpg?w=740'}" 
                            alt="Logo de ${item.nom || 'assuré'}" 
                            style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                    </td>
                    <td>${item.nom}</td>
                    <td>${item.prenom}</td>
                    <td>${item.genre}</td>
                 <td>${formattedDate}</td>
                <td>${item.profession}</td>
                <td>${formattedTel}</td><td>${item.email}</td>
                <td>${item.numero_rue}</td><td>${item.nom_rue}</td><td>${item.nom_pays}</td><td>${item.nom_ville}</td><td>${item.code_postal}</td></tr>
                `);
                });
            } else {
                physiqueTableBody.classList.add('d-none');
            }

            if (resultsMorale.length > 0) {
                moralTableBody.classList.remove('d-none');
                resultsMorale.forEach(item => {
                    const formattedTel = formatPhoneNumber(item.telephone);
                    moralTableBody.insertAdjacentHTML('beforeend', `
                <tr>
                <td>
                    <img src="${item.logo_entreprise && item.logo_entreprise !== '' && item.logo_entreprise !== null 
                        ? item.logo_entreprise 
                        : 'https://img.freepik.com/vecteurs-premium/icone-profil-utilisateur-dans-style-plat-illustration-vectorielle-avatar-membre-fond-isole-concept-entreprise-signe-autorisation-humaine_157943-15752.jpg?w=740'}" 
                        alt="Logo de ${item.raison_sociale || 'l’entreprise'}" 
                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                </td>

                    <td>${item.raison_sociale}</td>
                    <td>${item.numero_siret}</td><td>${item.type_organisation}</td><td>${item.email}</td>
                  <td>${formattedTel}</td> <td>${item.numero_rue}</td> 
                  <td>${item.nom_rue}</td><td>${item.code_postal}</td>
                  <td>${item.nom_pays}</td><td>${item.nom_ville}</td>
                  <td>${item.code_prestataire}</td>
                  <td>${(item.prestataire_en_convention === 1)?'Oui':'Non'}</td>
                </tr>
                `);
                });
            } else {
                moralTableBody.classList.add('d-none');
                
            }
            if (dataFocaux.length > 0) {
                const focauxBody = document.getElementById('focauxBody');
                focauxBody.classList.remove('d-none');

                dataFocaux.forEach(item => {
                    const formattedDate = formatDateNaissance(item.date_naissance);
                    const formattedTel = formatPhoneNumber(item.telephone);

                    focauxBody.insertAdjacentHTML('beforeend', `
            <tr>
                <td>${item.nom}</td>
                <td>${item.prenom}</td>
                <td>${item.genre}</td>
                <td>${item.numero_securite}</td>
                <td>${item.profession}</td>
                <td>${formattedDate}</td>
                <td>${formattedTel}</td>
                <td>${item.email}</td>
                <td>${item.numero_rue}</td>
                <td>${item.nom_rue}</td>
                <td>${item.code_postal}</td>
                <td>${item.nom_pays}</td>
                <td>${item.nom_ville}</td>
            </tr>
        `);
                });
            } else {
                const focauxBody = document.getElementById('focauxBody');
                const focauxTableFooter = document.getElementById('focauxTableFooter');

                focauxBody.classList.add('d-none');
                focauxTableFooter.classList.remove('d-none');
                focauxTableFooter.innerHTML = `
                <tr>
                    <td colspan="13" class="text-center text-muted">
                        Aucun point focal trouvé pour <strong> ${query} </strong>.
                    </td>
                </tr>
            `;
            }
            messageInitial.classList.add('d-none');
            if (messageAucunResultat) {
                const focauxTableFooter = document.getElementById('focauxTableFooter');
                const focauxBodyContainer = document.getElementById('focauxBodyContainer');
                focauxTableFooter.classList.remove('d-none');
                
                messageAucunResultat.classList.toggle('d-none', resultsPhysique.length > 0 || resultsMorale.length >
                    0);
                physiqueContainer.classList.toggle('d-none', resultsPhysique.length < 1);
                moralContainer.classList.toggle('d-none', resultsMorale.length < 1);
                focauxBodyContainer.classList.toggle('d-none', resultsMorale.length < 1);
                focauxTableFooter.classList.toggle('d-none', resultsMorale.length < 1);
            }
        });
    </script>


    <!-- FontAwesome pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
