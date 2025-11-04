<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/pwa/kartify/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Sep 2025 08:06:28 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="kartify">
    <meta name="keywords" content="kartify">
    <meta name="author" content="kartify">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="asset/images/logo/favicon.png" type="image/x-icon">
    <title>Kartify App</title>
    <link rel="apple-touch-icon" href="{{ asset('asset/images/logo/favicon.png') }}">
    <meta name="theme-color" content="#2777FC">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="kartify">
    <meta name="msapplication-TileImage" content="{{ asset('asset/images/logo/favicon.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- CSS dans le <head> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/vendors/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/vendors/iconsax.css') }}">
    <link rel="stylesheet" id="change-link" type="text/css" href="{{ asset('asset/css/style.css') }}">
    
</head>

<body>
    <!-- loader start-->
    <div class="loader-wrapper" id="loader">
        <span class="loader"></span>
    </div>
    <!-- loader end -->

    <!-- header start -->
    <header class="header">
        <div class="custom-container">
            <div class="head-content">
                <a href="#sidebar" class="sidebar-btn" data-bs-toggle="offcanvas">
                    <i class="iconsax" data-icon="text-align-left"></i>
                </a>

                <div class="ms-auto d-flex align-items-center gap-2">
                    <a href="search.html">
                        <i class="iconsax icon-btn" data-icon="search-normal-2"></i>
                    </a>
                    <a href="notification.html">
                        <i class="iconsax icon-btn notification-icon" data-icon="bell-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Dashboard Section -->
    <section class="pt-2">
        <div class="dashboard-container">
            <!-- Carte de statut de santé -->
            <div class="health-status-card mb-3">
                <div class="card-header">
                    <h5>Mon état de santé</h5>
                    <span class="status-badge">À jour</span>
                </div>
                <div class="card-body">
                    <div class="health-stats">
                        <div class="stat-item">
                            <i class="iconsax" data-icon="heart"></i>
                            <span>Tension</span>
                            <strong>120/80</strong>
                        </div>
                        <div class="stat-item">
                            <i class="iconsax" data-icon="activity"></i>
                            <span>Poids</span>
                            <strong>68 kg</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="quick-actions mb-3">
                <h5 class="section-title">Actions rapides</h5>
                <ul class="actions-grid">
                    <li>
                        <a href="prendre-rdv.html" class="action-box">
                            <div class="action-icon">
                                <i class="iconsax" data-icon="calendar-add"></i>
                            </div>
                            <h6>Prendre RDV</h6>
                        </a>
                    </li>
                    <li>
                        <a href="ordonnances.html" class="action-box">
                            <div class="action-icon">
                                <i class="iconsax" data-icon="document-text"></i>
                            </div>
                            <h6>Ordonnances</h6>
                        </a>
                    </li>
                    <li>
                        <a href="resultats.html" class="action-box">
                            <div class="action-icon">
                                <i class="iconsax" data-icon="clipboard-text"></i>
                            </div>
                            <h6>Résultats</h6>
                        </a>
                    </li>
                    <li>
                        <a href="teleconsultation.html" class="action-box">
                            <div class="action-icon">
                                <i class="iconsax" data-icon="video"></i>
                            </div>
                            <h6>Téléconsultation</h6>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Prochains rendez-vous -->
            <div class="upcoming-appointments mb-3">
                <div class="section-header">
                    <h5>Prochains rendez-vous</h5>
                    <a href="consultations.html" class="view-all">Voir tout</a>
                </div>
                <div class="appointment-card">
                    <div class="appointment-date">
                        <span class="day">15</span>
                        <span class="month">Nov</span>
                    </div>
                    <div class="appointment-info">
                        <h6>Dr. Martin Dubois</h6>
                        <p>Consultation générale</p>
                        <span class="time">14:30</span>
                    </div>
                    <button class="btn-confirm">Confirmer</button>
                </div>
            </div>

            <!-- Services de santé -->
            <div class="health-services">
                <h5 class="section-title">Services de santé</h5>
                <ul class="services-slider custom-scrollbar">
                    <li>
                        <a href="medecins.html" class="service-box">
                            <div class="service-icon">
                                <img class="img-fluid" src="assets/images/health/doctor.png" alt="Médecins">
                            </div>
                            <h6>Médecins</h6>
                        </a>
                    </li>
                    <li>
                        <a href="pharmacies.html" class="service-box">
                            <div class="service-icon">
                                <img class="img-fluid" src="assets/images/health/pharmacy.png" alt="Pharmacies">
                            </div>
                            <h6>Pharmacies</h6>
                        </a>
                    </li>
                    <li>
                        <a href="laboratoires.html" class="service-box">
                            <div class="service-icon">
                                <img class="img-fluid" src="assets/images/health/lab.png" alt="Laboratoires">
                            </div>
                            <h6>Laboratoires</h6>
                        </a>
                    </li>
                    <li>
                        <a href="urgences.html" class="service-box">
                            <div class="service-icon">
                                <img class="img-fluid" src="assets/images/health/emergency.png" alt="Urgences">
                            </div>
                            <h6>Urgences</h6>
                        </a>
                    </li>
                    <li>
                        <a href="specialistes.html" class="service-box">
                            <div class="service-icon">
                                <img class="img-fluid" src="assets/images/health/specialist.png" alt="Spécialistes">
                            </div>
                            <h6>Spécialistes</h6>
                        </a>
                    </li>
                    <li>
                        <a href="hopitaux.html" class="service-box">
                            <div class="service-icon">
                                <img class="img-fluid" src="assets/images/health/hospital.png" alt="Hôpitaux">
                            </div>
                            <h6>Hôpitaux</h6>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Mes documents récents -->
            <div class="recent-documents mt-3">
                <div class="section-header">
                    <h5>Documents récents</h5>
                    <a href="documents.html" class="view-all">Voir tout</a>
                </div>
                <div class="document-list">
                    <div class="document-item">
                        <i class="iconsax" data-icon="document-text"></i>
                        <div class="doc-info">
                            <h6>Ordonnance - Dr. Martin</h6>
                            <span>12 Nov 2025</span>
                        </div>
                        <button class="btn-download">
                            <i class="iconsax" data-icon="download"></i>
                        </button>
                    </div>
                    <div class="document-item">
                        <i class="iconsax" data-icon="clipboard-text"></i>
                        <div class="doc-info">
                            <h6>Résultats d'analyse</h6>
                            <span>08 Nov 2025</span>
                        </div>
                        <button class="btn-download">
                            <i class="iconsax" data-icon="download"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Rappels médicaments -->
            <div class="medication-reminders mt-3">
                <div class="section-header">
                    <h5>Rappels médicaments</h5>
                    <a href="medicaments.html" class="view-all">Gérer</a>
                </div>
                <div class="reminder-card">
                    <div class="reminder-icon">
                        <i class="iconsax" data-icon="health"></i>
                    </div>
                    <div class="reminder-info">
                        <h6>Paracétamol 500mg</h6>
                        <p>À prendre dans 2 heures</p>
                    </div>
                    <button class="btn-taken">Pris</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop section end -->

    <!-- tap to top start -->
    <div class="tap-to-top-box">
        <a href="#" class="scroll scroll-to-top">
            <i class="iconsax arrow" data-icon="arrow-up"></i>
            Tap to Top
        </a>
    </div>
    <!-- tap to top end -->

    <!-- bottom panel start -->
    <ul class="bottom-menu">
        <!-- Accueil -->
        <li>
            <a href="home.html" class="active">
                <i class="iconsax text-content" data-icon="home-2"></i>
                <h6>Accueil</h6>
            </a>
        </li>

        <!-- Rendez-vous -->
        <li>
            <a href="consultations.html">
                <i class="iconsax text-content" data-icon="calendar"></i>
                <h6>Rendez-vous</h6>
            </a>
        </li>

        <!-- Dossier -->
        <li>
            <a href="dossier-medical.html">
                <i class="iconsax text-content" data-icon="document-text-1"></i>
                <h6>Dossier</h6>
            </a>
        </li>

        <!-- Notifications -->
        <li>
            <a href="notifications.html">
                <i class="iconsax text-content" data-icon="notification"></i>
                <h6>Alertes</h6>
            </a>
        </li>

        <!-- Profil -->
        <li>
            <a href="account.html">
                <i class="iconsax text-content" data-icon="user-2"></i>
                <h6>Profil</h6>
            </a>
        </li>
    </ul>
    <!-- bottom panel end -->

    <!-- sidebar starts -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="sidebar">
        <div class="offcanvas-header sidebar-header">
            <div class="sidebar-logo">
                {{-- <img class="img-fluid logo" src="assets/images/logo/logo.png" alt="logo"> --}}
            </div>
        </div>
        <div class="offcanvas-body">
            <!-- Profil utilisateur -->
            <a href="edit-profile.html" class="profile-part">
                {{-- <img class="img-fluid profile-pic" src="assets/images/avatar/1.png" alt="profile"> --}}
                <div>
                    <h3>Smitha Williams</h3>
                    <span>Modifier le profil</span>
                </div>
            </a>

            <!-- Menu principal -->
            <ul class="link-section switch-section">
                <!-- Accueil -->
                <li class="active">
                    <a href="home.html" class="pages">
                        <i class="iconsax sidebar-icon icon" data-icon="home-2"></i>
                        <h3>Accueil</h3>
                    </a>
                </li>

                <!-- Mes consultations -->
                <li>
                    <a href="consultations.html" class="pages">
                        <i class="iconsax sidebar-icon icon" data-icon="calendar"></i>
                        <h3>Mes consultations</h3>
                    </a>
                </li>

                <!-- Mes ordonnances -->
                <li>
                    <a href="ordonnances.html" class="pages">
                        <i class="iconsax sidebar-icon icon" data-icon="document-text-1"></i>
                        <h3>Mes ordonnances</h3>
                    </a>
                </li>

                <!-- Mon dossier médical -->
                <li>
                    <a href="dossier-medical.html" class="pages">
                        <i class="iconsax sidebar-icon icon" data-icon="health"></i>
                        <h3>Dossier médical</h3>
                    </a>
                </li>

                <!-- Mes examens -->
                <li>
                    <a href="examens.html" class="pages">
                        <i class="iconsax sidebar-icon icon" data-icon="activity"></i>
                        <h3>Mes examens</h3>
                    </a>
                </li>

                <!-- Mon profil -->
                <li>
                    <a href="account.html" class="pages">
                        <i class="iconsax sidebar-icon icon" data-icon="user-2"></i>
                        <h3>Mon profil</h3>
                    </a>
                </li>

                <!-- Paramètres -->
                <li>
                    <a href="settings.html" class="pages">
                        <i class="iconsax sidebar-icon icon" data-icon="setting-2"></i>
                        <h3>Paramètres</h3>
                    </a>
                </li>
            </ul>

            <!-- Déconnexion -->
            <div class="bottom-sidebar">
                <a href="{{ route('connexion') }}" class="pages">
                    <i class="iconsax sidebar-icon" data-icon="logout-2"></i>
                    <h3>Déconnexion</h3>
                </a>
            </div>
        </div>
    </div>
    <!-- sidebar end -->
<!-- JS avant </body> -->
<script src="{{ asset('asset/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('asset/js/custom-swiper.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/js/iconsax-icon.js') }}"></script>
<script src="{{ asset('asset/js/template-setting.js') }}"></script>
<script src="{{ asset('asset/js/range-slider.js') }}"></script>
<script src="{{ asset('asset/js/timer.js') }}"></script>
<script src="{{ asset('asset/js/tap-to-top.js') }}"></script>
<script src="{{ asset('asset/js/script.js') }}"></script>

</body>


</html>
