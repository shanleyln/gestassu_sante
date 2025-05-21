<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Espace Client')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar-brown {
            background-color: #5e2d17 !important;
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
            border-radius: 9px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #5e2d17;
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
        <a class="navbar-brand" href="#" style="color:#fff; font-weight:normal; letter-spacing:0.5px;">Espace
            Client</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end py-4"
                style="padding-right:0;padding-left:0;">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.dashboard') ? ' active' : '' }}"
                                href="{{ route('client.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Tableau de
                                bord</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.contrats') ? ' active' : '' }}"
                                href="{{ route('client.contrats') }}"><i class="bi bi-file-earmark-text me-2"></i>Mes
                                Contrats</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.beneficiaires') ? ' active' : '' }}"
                                href="{{ route('client.beneficiaires') }}"><i
                                    class="bi bi-people me-2"></i>Bénéficiaires</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.cartes') ? ' active' : '' }}"
                                href="{{ route('client.cartes') }}"><i class="bi bi-credit-card-2-front me-2"></i>Cartes
                                de Santé</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.garanties') ? ' active' : '' }}"
                                href="{{ route('client.garanties') }}"><i class="bi bi-shield-check me-2"></i>Garanties
                                & Remb.</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.prestations') ? ' active' : '' }}"
                                href="{{ route('client.prestations') }}"><i class="bi bi-chat-left-text me-2"></i>Suivi
                                des Prestations</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.declarations') ? ' active' : '' }}"
                                href="{{ route('client.declarations') }}"><i class="bi bi-upload me-2"></i>Déclarations
                                / Demandes</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.paiements') ? ' active' : '' }}"
                                href="{{ route('client.paiements') }}"><i
                                    class="bi bi-cash-stack me-2"></i>Cotisations</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.documents') ? ' active' : '' }}"
                                href="{{ route('client.documents') }}"><i
                                    class="bi bi-folder2-open me-2"></i>Documents</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.demarches') ? ' active' : '' }}"
                                href="{{ route('client.demarches') }}"><i
                                    class="bi bi-pencil-square me-2"></i>Démarches</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.communication') ? ' active' : '' }}"
                                href="{{ route('client.communication') }}"><i
                                    class="bi bi-chat-dots me-2"></i>Communication</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.parametres') ? ' active' : '' }}"
                                href="{{ route('client.parametres') }}"><i class="bi bi-gear me-2"></i>Paramètres</a>
                        </li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.support') ? ' active' : '' }}"
                                href="{{ route('client.support') }}"><i
                                    class="bi bi-question-circle me-2"></i>Support</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.analyse') ? ' active' : '' }}"
                                href="{{ route('client.analyse') }}"><i class="bi bi-bar-chart-line me-2"></i>Analyse
                                (entreprise)</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('client.mobile') ? ' active' : '' }}"
                                href="{{ route('client.mobile') }}"><i class="bi bi-phone me-2"></i>Accès Mobile</a>
                        </li>
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
                <h2 class="mb-4">@yield('title')</h2>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
