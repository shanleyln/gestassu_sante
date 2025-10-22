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

<title>Activation</title>

<!-- Animation css -->
<link rel="stylesheet" href="{{ asset('assets/vendor/animation/animate.min.css') }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
    rel="stylesheet">

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
<!--font-awesome-css-->
<link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.css') }}">

<link rel="preload" as="style" href="{{ asset('build/assets/style-Cuxwy5N_.css') }}" />
<link rel="stylesheet" href="{{ asset('build/assets/style-Cuxwy5N_.css') }}" /><!-- phosphor-icon css-->
<link href="{{ asset('assets/vendor/phosphor/phosphor-bold.css') }}" rel="stylesheet">
<style>

</style>

<body>
    <div class="app-wrapper d-block">
        <div class="">
            <!-- Body main section starts -->
            <main class="w-100 p-0">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Verify OTP 1 start -->
                        <div class="col-12 p-0 ">
                            <div class="login-form-container"
                                style="background: linear-gradient(#5e2d177c, #54422f),
url('{{ asset('/imgs/login1.png') }}') no-repeat center center;
background-size: cover;
background-attachment: fixed;
color: #fff;">
                                <div class="mb-4">
                                    <a class="logo" href="#">
                                        <i class="ti ti-lock text-white" style="font-size: 40px;"></i>
                                    </a>
                                </div>
                                <div class="form_container">
                                    <form method="POST" class="app-form" action="{{ url('/sendMail') }}"
                                        class="needs-validation" novalidate onsubmit="return validateForm(event)">
                                        @csrf

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5 text-center">
                                                    <h2 class="text-primary">Activation du compte</h2>
                                                    <p>Bonjour, entrez votre identifiant pour l'activation de votre
                                                        compte</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                @if ($errors->any())
                                                    <div class="alert alert-light-border-danger d-flex align-items-center justify-content-between"
                                                        role="alert">
                                                        <p class="mb-0 text-danger">
                                                            <i class="ti ti-alert-circle f-s-18 me-2"></i>
                                                            {{ $errors->first() }}
                                                        </p>
                                                        <i class="ti ti-x" data-bs-dismiss="alert"></i>
                                                    </div>
                                                @endif
                                                @if ($errors->has('mail'))
                                                    <div class="alert alert-light-border-danger d-flex align-items-center justify-content-between"
                                                        role="alert">
                                                        <p class="mb-0 text-danger ">
                                                            <i
                                                                class="ti ti-alert-circle f-s-18 me-2"></i>{{ $errors->first('mail') }}
                                                        </p>
                                                        <i class="ti ti-x" data-bs-dismiss="alert"></i>
                                                    </div>
                                                @endif
                                                <div class="mb-3">
                                                    <label class="form-label" for="identifiant">Identifiant
                                                        client</label>
                                                    <input class="form-control" id="identifiant" name="identifiant"
                                                        placeholder="Votre identifiant" required type="text">
                                                </div>
                                                <div class="form-check mb-3" style="color:#5e2d17;font-size:0.98rem;">
                                                    <!-- Champ caché pour forcer la valeur à 0 si décoché -->
                                                    <input type="hidden" name="version_test" value="0">

                                                    <!-- Checkbox (valeur 1 si coché) -->
                                                    <input class="form-check-input shadow" type="checkbox"
                                                        name="version_test" id="version_test" value="1">
                                                    <label class="form-check-label fw-semibold" for="version_test">
                                                        Se connecter en version test.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <button id="btnSubmit" class="btn btn-primary w-100"
                                                        type="button" onclick="handleSubmit(event)">Activer</button>
                                                    <!-- Bouton de chargement (masqué au début) -->
                                                    <button type="button" id="btnLoading"
                                                        class="btn btn-dark w-100 fw-bold d-none" disabled>
                                                        <span class="spinner-border spinner-border-sm me-2"
                                                            role="status" aria-hidden="true"></span>
                                                        validation en cours...
                                                    </button>
                                                </div>
                                                <a href="{{ route('login') }}" class="btn btn-link text-danger px-0">
                                                    <i class="ti ti-arrow-left me-1"></i>Annuler la validation
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Verify OTP 1 end -->
                    </div>
                </div>
            </main>
            <!-- Body main section ends -->
        </div>
    </div>
    <script>
        function handleSubmit(event) {
            event.preventDefault();

            const form = event.target.closest('form');
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return false;
            }

            const btnSubmit = document.getElementById('btnSubmit');
            const btnLoading = document.getElementById('btnLoading');

            // Masquer le bouton principal, afficher le bouton loading
            btnSubmit.classList.add('d-none');
            btnLoading.classList.remove('d-none');

            // Soumettre après une courte pause
            setTimeout(() => {
                form.submit();
            }, 500);

            return true;
        }
    </script>
    <!--js-->
    <script src="{{ asset('assets/js/coming_soon.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Simple bar js-->
    <script src="{{ asset('assets/vendor/simplebar/simplebar.js') }}"></script>

    <!-- phosphor js -->
    <script src="{{ asset('assets/vendor/phosphor/phosphor.js') }}"></script>

    <script src="{{ asset('assets/js/project_app.js') }}"></script>
    <!-- alert js-->
    <script src="{{ asset('assets/js/alert.js') }}"></script>
</body>

<!-- Mirrored from phplaravel-1384472-5380003.cloudwaysapps.com/sign_up by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jun 2025 02:03:15 GMT -->

</html>
