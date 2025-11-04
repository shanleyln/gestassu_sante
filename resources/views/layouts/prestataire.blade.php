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

        body {
            padding-top: 60px;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            background: #fff !important;
            border-radius: 9px;
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
            border-radius: 9px;
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
            box-shadow: 0 2px 8px 0 rgba(139, 92, 45, 0.07);
        }

        .sidebar .nav-link.active {
            box-shadow: 0 4px 16px 0 rgba(139, 92, 45, 0.07);
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
            scrollbar-color: #5e2d17 #f5f5f5;
        }

        .sidebar::-webkit-scrollbar {
            width: 7px;
            background: #f5f5f5;
            border-radius: 8px;
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

        .breadcrumb-link1 {
            color: #5e2e17d7;
            text-decoration: underline;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            text-decoration: none;
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
        <a class="navbar-brand" href="#">Espace Prestataire</a>
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
            <nav class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end py-4"
                style="padding-right:0;padding-left:0;">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.actualite') ? ' active' : '' }}"
                                href="{{ route('prestataire.actualite') }}"><strong><i
                                        class="bi bi-house-door-fill"></i>Acceuil</strong></a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.dashboard') ? ' active' : '' }}"
                                href="{{ route('prestataire.dashboard') }}"><i
                                    class="bi bi-speedometer2 me-2"></i>Tableau de bord</a></li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('verification', 'verification_affiche') ? ' active' : '' }}"
                                href="{{ route('verification') }}">
                                <i class="bi bi-card-checklist me-2"></i>Vérification Carte
                            </a>
                        </li>
                        {{-- <li class="nav-item"><a
                                class="nav-link{{ request()->routeIs('prestataire.garanties') ? ' active' : '' }}"
                                href="{{ route('prestataire.garanties') }}"><i
                                    class="bi bi-shield-check me-2"></i>Garanties</a></li> --}}
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-clipboard-plus me-2"></i>Prises en charge
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-receipt me-2"></i>Factures
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-cash-stack me-2"></i>Paiements
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-people me-2"></i>Patients
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-folder2-open me-2"></i>Documents
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-chat-dots me-2"></i>Communication
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-bar-chart-line me-2"></i>Statistiques
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-gear me-2"></i>Paramètres
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled text-muted d-flex " href="#"><i
                                    class="bi bi-question-circle me-2"></i>Support
                            </a></li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-danger fw-bold d-flex " href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
