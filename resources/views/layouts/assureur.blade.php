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
        <a class="navbar-brand" href="#">Espace Assureur :
            <strong>{{ \Illuminate\Support\Facades\Auth::guard('api_user')->user()->nomassureure }}</strong></a>
        <a class="navbar-brand" href="#">{{ \Illuminate\Support\Facades\Auth::guard('api_user')->user()->nom }}
            {{ \Illuminate\Support\Facades\Auth::guard('api_user')->user()->prenom }}</a>
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
                                href="{{ route('assureur.actualite') }}"><strong><i class="bi bi-house-door-fill"></i>Acceuil</strong></a></li>
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
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-chat-dots me-2"></i>Communication</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-patch-check me-2"></i>Conformité</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-gear me-2"></i>Administration</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#"><i
                                    class="bi bi-plug me-2"></i>Intégration</a></li>
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
        <div class="modal fade" id="beneficiaireModal" tabindex="-1" aria-labelledby="beneficiaireModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" style="padding: 30px">
                <div class="modal-content">
                    <div class="modal-header bgPrimary text-white">
                        <h5 class="modal-title" id="beneficiaireModalLabel">Liste des assureurs</h5>
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
                                        placeholder="Tapez une recherche pour afficher un assureur...">
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>



                        <!-- Tableau bénéficiaires -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center align-middle">
                                <thead>
                                    <tr>
                                        <th style="background-color: #5e2d17; color: white;">Raison sociale</th>
                                        <th style="background-color: #5e2d17; color: white;">Type prestataire</th>
                                        <th style="background-color: #5e2d17; color: white;">Code assurance</th>
                                        <th style="background-color: #5e2d17; color: white;">Code Prestataire</th>
                                        <th style="background-color: #5e2d17; color: white;">Numéro SIRET</th>
                                        <th style="background-color: #5e2d17; color: white;">Téléphone</th>
                                        <th style="background-color: #5e2d17; color: white;">Email</th>
                                        <th style="background-color: #5e2d17; color: white;">N° Rue</th>
                                        <th style="background-color: #5e2d17; color: white;">Nom Rue</th>
                                        <th style="background-color: #5e2d17; color: white;">Pays</th>
                                        <th style="background-color: #5e2d17; color: white;">Ville</th>
                                        <th style="background-color: #5e2d17; color: white;">Code postal</th>
                                    </tr>
                                </thead>
                                <tbody class="d-none" id="beneficiaireTableBody">
                                    <!-- Résultats dynamiques ici -->
                                </tbody>
                            </table>
                            <div id="messageAucunResultat" class="text-center text-danger py-3 d-none"
                                style="font-size: 20px">
                                Aucun assureur trouvé.
                            </div>
                        </div>
                        <!-- Message si aucune recherche -->
                        <div id="messageAucun" class="text-center textPrimary py-5" style="font-size: 20px">
                            Tapez une recherche pour afficher un ou plusieurs assureur(s).
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        const data = [{
                raison: 'ASSINCO Assurances',
                type: 'GA-A5',
                codeAss: 'GA-A5',
                codePres: '2007B05810',
                siret: '2007B05810',
                tel: '011721925 /0117',
                email: 'assinco@assinco.rg',
                rueNum: '1935',
                rueNom: 'Boulevard de la nation',
                pays: 'Gabon',
                ville: 'Libreville',
                postal: 'BP 7812'
            },
            // Ajoute ici d'autres objets similaires si besoin
        ];

        const input = document.getElementById('searchInput');
        const tableBody = document.getElementById('beneficiaireTableBody');
        const messageInitial = document.getElementById('messageAucun');
        const messageAucunResultat = document.getElementById('messageAucunResultat');

        input.addEventListener('input', () => {
            const query = input.value.toLowerCase();
            tableBody.innerHTML = '';

            if (query === '') {
                messageInitial.classList.remove('d-none');
                tableBody.classList.add('d-none');
                return;
            }

            const results = data.filter(item =>
                Object.values(item).some(val =>
                    val.toLowerCase().includes(query)
                )
            );

            messageInitial.classList.add('d-none');
            tableBody.classList.remove('d-none');

            if (results.length === 0) {
                messageAucunResultat.classList.remove('d-none');
            } else {
                messageAucunResultat.classList.add('d-none');
                results.forEach(item => {
                    const row = `
                    <tr>
                        <td>${item.raison}</td>
                        <td>${item.type}</td>
                        <td>${item.codeAss}</td>
                        <td>${item.codePres}</td>
                        <td>${item.siret}</td>
                        <td>${item.tel}</td>
                        <td>${item.email}</td>
                        <td>${item.rueNum}</td>
                        <td>${item.rueNom}</td>
                        <td>${item.pays}</td>
                        <td>${item.ville}</td>
                        <td>${item.postal}</td>
                    </tr>`;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            }
        });
    </script>

    <!-- FontAwesome pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
