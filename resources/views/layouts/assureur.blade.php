<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Espace Assureur')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .navbar {
            min-height: 56px;
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
        <a class="navbar-brand" href="#" style="color:#fff; font-weight:normal; letter-spacing:0.5px;">Espace Assureur</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end py-4" style="padding-right:0;padding-left:0;">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.dashboard') ? ' active' : '' }}" href="{{ route('assureur.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.contrats') ? ' active' : '' }}" href="{{ route('assureur.contrats') }}"><i class="bi bi-file-earmark-text me-2"></i>Contrats</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.assures') ? ' active' : '' }}" href="{{ route('assureur.assures') }}"><i class="bi bi-people me-2"></i>Assurés</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.primes') ? ' active' : '' }}" href="{{ route('assureur.primes') }}"><i class="bi bi-wallet2 me-2"></i>Primes & Cotisations</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.sinistres') ? ' active' : '' }}" href="{{ route('assureur.sinistres') }}"><i class="bi bi-exclamation-triangle me-2"></i>Sinistres</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.prestataires') ? ' active' : '' }}" href="{{ route('assureur.prestataires') }}"><i class="bi bi-hospital me-2"></i>Prestataires</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.prises') ? ' active' : '' }}" href="{{ route('assureur.prises') }}"><i class="bi bi-envelope-open me-2"></i>Prises en charge</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.reporting') ? ' active' : '' }}" href="{{ route('assureur.reporting') }}"><i class="bi bi-bar-chart-line me-2"></i>Reporting</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.documents') ? ' active' : '' }}" href="{{ route('assureur.documents') }}"><i class="bi bi-folder2-open me-2"></i>Documents</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.communication') ? ' active' : '' }}" href="{{ route('assureur.communication') }}"><i class="bi bi-chat-dots me-2"></i>Communication</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.conformite') ? ' active' : '' }}" href="{{ route('assureur.conformite') }}"><i class="bi bi-patch-check me-2"></i>Conformité</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.administration') ? ' active' : '' }}" href="{{ route('assureur.administration') }}"><i class="bi bi-gear me-2"></i>Administration</a></li>
                        <li class="nav-item"><a class="nav-link{{ request()->routeIs('assureur.integration') ? ' active' : '' }}" href="{{ route('assureur.integration') }}"><i class="bi bi-plug me-2"></i>Intégration</a></li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-danger fw-bold d-flex align-items-center" href="{{ route('login') }}">
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
