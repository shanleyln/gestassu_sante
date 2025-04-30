<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Espace Prestataire')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionnel : icônes Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar-brown {
            background-color: #8B5C2D !important;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
        }

        body {
            padding-top: 60px;

        }

        .sidebar {
            background: #fff !important;
            border-radius: 18px;
            box-shadow: 0 2px 12px 0 rgba(139, 92, 45, 0.07);
            min-height: 92vh;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 6px;
            margin-right: 6px;
            position: fixed;
            top: 50px;
            /* hauteur navbar */
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
            border-radius: 12px;
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
            background: #8B5C2D !important;
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

        /* Le contenu principal est maintenant géré uniquement par la grille Bootstrap. */

        /* Scrollbar design for sidebar */
        .sidebar {
            scrollbar-width: thin;
            scrollbar-color: #8B5C2D #f5f5f5;
        }

        .sidebar::-webkit-scrollbar {
            width: 7px;
            background: #f5f5f5;
            border-radius: 9px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #8B5C2D;
            border-radius: 9px;
            min-height: 40px;
            transition: background 0.2s;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #a06c3c;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f5f5f5;
            border-radius: 9px;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-dark navbar-brown px-3">
        <a class="navbar-brand" href="#">Espace Prestataire</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end py-4"
                style="padding-right:0;padding-left:0;">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.dashboard') ? ' active' : '' }}"
                                href="{{ route('prestataire.dashboard') }}"><i
                                    class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.verification') ? ' active' : '' }}"
                                href="{{ route('prestataire.verification') }}"><i
                                    class="bi bi-card-checklist me-2"></i>Vérification Carte</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.garanties') ? ' active' : '' }}"
                                href="{{ route('prestataire.garanties') }}"><i
                                    class="bi bi-shield-check me-2"></i>Garanties</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.prises') ? ' active' : '' }}"
                                href="{{ route('prestataire.prises') }}"><i class="bi bi-clipboard-plus me-2"></i>Prises
                                en charge</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.factures') ? ' active' : '' }}"
                                href="{{ route('prestataire.factures') }}"><i
                                    class="bi bi-receipt me-2"></i>Factures</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.paiements') ? ' active' : '' }}"
                                href="{{ route('prestataire.paiements') }}"><i
                                    class="bi bi-cash-stack me-2"></i>Paiements</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.patients') ? ' active' : '' }}"
                                href="{{ route('prestataire.patients') }}"><i
                                    class="bi bi-people me-2"></i>Patients</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.documents') ? ' active' : '' }}"
                                href="{{ route('prestataire.documents') }}"><i
                                    class="bi bi-folder2-open me-2"></i>Documents</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.communication') ? ' active' : '' }}"
                                href="{{ route('prestataire.communication') }}"><i
                                    class="bi bi-chat-dots me-2"></i>Communication</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.statistiques') ? ' active' : '' }}"
                                href="{{ route('prestataire.statistiques') }}"><i
                                    class="bi bi-bar-chart-line me-2"></i>Statistiques</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.parametres') ? ' active' : '' }}"
                                href="{{ route('prestataire.parametres') }}"><i
                                    class="bi bi-gear me-2"></i>Paramètres</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.support') ? ' active' : '' }}"
                                href="{{ route('prestataire.support') }}"><i
                                    class="bi bi-question-circle me-2"></i>Support</a></li>
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
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <h2>@yield('title')</h2>
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
