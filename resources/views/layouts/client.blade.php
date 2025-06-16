<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Ingenium Santé est une plateforme digitale innovante" name="description">
<meta
    content="Ingenium Santé est une plateforme digitale innovante qui connecte les assurés, les entreprises clientes, les assureurs et les prestataires de santé. Elle permet une gestion dématérialisée et instantanée des informations relatives aux couvertures santé."
    name="keywords">

<link rel="icon" href="{{ asset('imgs/icon_logo.png') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('imgs/icon_logo.png') }}" type="image/x-icon">

<title>@yield('title', 'Espace Client')</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
    rel="stylesheet">
<link rel="preload" as="style" href="{{ asset('build/assets/style-Cuxwy5N_.css') }}" />

<!--Flag Icon css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/flag-icons-master/flag-icon.css') }}">

<!-- Tabler icons-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/tabler-icons/tabler-icons.css') }}">

<!-- Prism css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/prism/prism.min.css') }}">

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">

<!-- Simplebar css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/simplebar/simplebar.css') }}">

<!-- apexcharts css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/apexcharts/apexcharts.css') }}">

<!-- glight css -->
<link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/glightbox.min.css') }}">

 <!-- Data Table css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatable/jquery.dataTables.min.css')}}">

<link rel="preload" as="style" href="{{ asset('build/assets/style-Cuxwy5N_.css') }}" />
<link rel="stylesheet" href="{{ asset('build/assets/style-Cuxwy5N_.css') }}" />
<!-- css end !-->
<style>
    .main-nav .no-sub .nav-link {
        color: inherit;
        transition: all 0.3s ease;
        border-radius:3px
    }

    .main-nav .no-sub .nav-link:focus,
.main-nav .no-sub .nav-link.active {
    color: #fff !important;
    background-color: #5e2d17;
    font-weight: bold;
    margin-left: 7px;
    margin-right: 7px;
    margin-top: 4px;
    border-radius: 3px;
    box-shadow: 0 2px 8px 0 rgba(139, 92, 45, 0.09);
}

.main-nav .no-sub .nav-link:hover{
    color: #5e2d17 !important;
    background-color: transparent !important;
    border: 1px solid #5e2d17;
    font-weight: bold;
    margin-left: 7px;
    margin-right: 7px;
    margin-top: 4px;
    border-radius: 3px;
    box-shadow: none;
}


    .main-nav .no-sub .nav-link.active {
        box-shadow: 0 4px 16px 0 rgba(139, 92, 45, 0.13);
        border-radius:3px;
    }
</style>

<body>
    <!-- Loader start-->
    <div class="app-wrapper">
        <!-- Loader start-->
        <div class="loader-wrapper">
            <div class="loader_24"></div>
        </div>
        <!-- Loader end-->
        <!-- Menu Navigation start -->
        <!-- Menu Navigation starts -->
        <nav style="width:300px">
            <div class="app-logo">
                <a class="logo d-inline-block" href="index.html">
                    <img alt="#" src="{{asset('assets/images/logo/1.png')}}">
                </a>

                <span class="bg-light-primary toggle-semi-nav d-flex-center">
                    <i class="ti ti-chevron-right"></i>
                </span>

                <div class="d-flex align-items-center nav-profile p-3">
                    <span class="h-45 w-45 d-flex-center b-r-10 position-relative bg-danger m-auto">
                        <img alt="avatar" class="img-fluid b-r-10" src="{{asset('assets/images/avatar/woman.jpg')}}">
                        <span
                            class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
                    </span>
                    <div class="flex-grow-1 ps-2">
                        <h6 class="text-primary mb-0"> Ninfa Monaldo</h6>
                        <p class="text-muted f-s-12 mb-0">Web Developer</p>
                    </div>


                    <div class="dropdown profile-menu-dropdown">
                        <a aria-expanded="false" data-bs-auto-close="true" data-bs-placement="top"
                            data-bs-toggle="dropdown" role="button">
                            <i class="ti ti-settings fs-5"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="f-w-500" href="profile.html" target="_blank">
                                    <i class="ph-duotone  ph-user-circle pe-1 f-s-20"></i> Profile Details
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a class="f-w-500" href="setting.html" target="_blank">
                                    <i class="ph-duotone  ph-gear pe-1 f-s-20"></i> Settings
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <a class="f-w-500" href="#">
                                            <i class="ph-duotone  ph-detective pe-1 f-s-20"></i> Incognito
                                        </a>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input form-check-primary" id="incognitoSwitch"
                                                type="checkbox">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="app-nav" id="app-simple-bar">
                <ul class="main-nav p-0 mt-2">
                    <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.dashboard') ? ' active' : '' }}"
                                href="{{route('client.dashboard')}}"><i class="bi bi-speedometer2 me-2"></i>Tableau de
                                bord</a></li>
                        
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('clients.beneficiaires') ? ' active' : '' }}"
                                href="{{route('clients.beneficiaires')}}"><i
                                    class="bi bi-people me-2"></i>Bénéficiaires</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.contrats') ? ' active' : '' }}"
                                href="#"><i class="bi bi-file-earmark-text me-2"></i>Mes
                                Contrats
                            </a></li>
                                    <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.cartes') ? ' active' : '' }}"
                                href="#"><i class="bi bi-credit-card-2-front me-2"></i>Cartes
                                de Santé</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.garanties') ? ' active' : '' }}"
                                href="#"><i class="bi bi-shield-check me-2"></i>Garanties
                                & Remb.</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.prestations') ? ' active' : '' }}"
                                href="#"><i class="bi bi-chat-left-text me-2"></i>Suivi
                                des Prestations</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.declarations') ? ' active' : '' }}"
                                href="#"><i class="bi bi-upload me-2"></i>Déclarations / Demandes</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.paiements') ? ' active' : '' }}"
                                href="#"><i
                                    class="bi bi-cash-stack me-2"></i>Cotisations</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.documents') ? ' active' : '' }}"
                                href="#"><i
                                    class="bi bi-folder2-open me-2"></i>Documents</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.demarches') ? ' active' : '' }}"
                                href="#"><i
                                    class="bi bi-pencil-square me-2"></i>Démarches</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.communication') ? ' active' : '' }}"
                                href="#"><i
                                    class="bi bi-chat-dots me-2"></i>Communication</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.parametres') ? ' active' : '' }}"
                                href="#"><i class="bi bi-gear me-2"></i>Paramètres</a>
                        </li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.support') ? ' active' : '' }}"
                                href="#"><i
                                    class="bi bi-question-circle me-2"></i>Support</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.analyse') ? ' active' : '' }}"
                                href="#"><i class="bi bi-bar-chart-line me-2"></i>Analyse
                                (entreprise)</a></li>
                        <li class="nav-item no-sub"><a
                                class="nav-link{{ request()->routeIs('client.mobile') ? ' active' : '' }}"
                                href="#"><i class="bi bi-phone me-2"></i>Accès Mobile</a>
                        </li>
                        <li class="nav-item no-sub mt-4">
                            <a class="nav-link text-danger fw-bold d-flex align-items-center"
                                href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                            </a>
                        </li>
                </ul>
            </div>

            <div class="menu-navs">
                <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
                <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
            </div>

        </nav>
        <!-- Menu Navigation ends -->
        <!-- Menu Navigation end -->


        <div class="app-content">
            <!-- Header Section start -->
            <!-- Header Section starts -->
            {{-- <div class="row">
                <div class="col-md-2 col-lg-2 d-md-block bg-white sidebar border-end"> --}}

                    <header class="header-main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-8 col-sm-6 d-flex align-items-center header-left p-0">
                                    <span class="header-toggle ">
                             <i class="ph ph-squares-four"></i>
                           </span>
                                    <div class="header-searchbar w-100">
                                        <form action="#" class="mx-sm-3 app-form app-icon-form ">
                                            <div class="position-relative">
                                                <input aria-label="Search" class="form-control"
                                                    placeholder="Search..." type="search">
                                                <i class="ti ti-search text-dark"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div
                                    class="col-4 col-sm-6 d-flex align-items-center justify-content-end header-right p-0">

                                    <ul class="d-flex align-items-center">

                                        <li class="header-language">
                                            <div class="flex-shrink-0 dropdown" id="lang_selector">
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

                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </header>

                    <!-- Header Section ends -->
                    <!-- Header Section end -->

                    <!-- Main Section start -->

                {{-- </div> --}}
                <!-- Body main section starts -->
                <main>
                    {{-- <h2 class="mb-4">@yield('title')</h2> --}}
                    @yield('content')
                </main>
                <!-- Main Section end -->
            {{-- </div> --}}
        </div>

        <!-- tap on top -->
        <div class="go-top">
            <span class="progress-value">
                <i class="ti ti-arrow-up"></i>
            </span>
        </div>

        <!-- Footer Section start -->
        <!-- Footer Section starts-->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <p class="footer-text f-w-600 mb-0">Copyright © 2025 ingenium-assurance. Tous droits réservés 💖 V1.0.0
                        </p>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-text text-end">
                            <a class="f-w-500 text-primary" href="mailto:teqlathemes@gmail.com"> Besoin d'aide <i
                                    class="ti ti-help"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section ends-->
        <!-- Footer Section end -->
    </div>

    <!--customizer-->
    <div id="customizer"></div>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Simple bar js-->
    <script src="{{ asset('assets/vendor/simplebar/simplebar.js') }}"></script>

    <!-- phosphor js -->
    <script src="{{ asset('assets/vendor/phosphor/phosphor.js') }}"></script>

    <!-- Customizer js-->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>

    <!-- prism js-->
    <script src="{{ asset('assets/vendor/prism/prism.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- apexcharts js-->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Glight js -->
    <script src="{{ asset('assets/vendor/glightbox/glightbox.min.js') }}"></script>

    <!-- Ecommerce js-->
    <script src="{{ asset('assets/js/ecommerce_dashboard.js') }}"></script>

      <!-- datatable js-->
    <script src="{{asset('assets/vendor/datatable/jquery.dataTables.min.js')}}"></script>

       <!-- script js -->
    <script src="{{asset('assets/js/advance_table.js')}}"></script>
</body>

<!-- Mirrored from phplaravel-1384472-5380003.cloudwaysapps.com/sign_up by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jun 2025 02:03:15 GMT -->

</html>
