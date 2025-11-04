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

<link rel="icon" href="{{ asset('imgs/icon_logo.PNG') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('imgs/icon_logo.PNG') }}" type="image/x-icon">

<title>Connexion</title>

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
<body class="sign-in-bg">
    <div class="app-wrapper d-block">
        <div class="main-container">
            <!-- sign up start -->
            <div class="container main-container" >
                <div class="row main-content-box" style="background-image: url('{{ asset('imgs/img_login.png') }}');">
                    <div class="col-lg-7 image-content-box d-none d-lg-block">
                        <div class="form-container">

                            <div class="signup-content mt-4">
                                <span>
                                    <img alt="" class="img-fluid " src="assets/images/logo/1.png">
                                </span>
                            </div>

                            <div class="signup-bg-img">
                                <img alt="" class="img-fluid" src="assets/imags/login/02.png">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 form-content-box">
                        <div class="form-container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 text-center text-lg-start">
                                        <h2 class="text-white f-w-600">Se connecter </h2>
                                        <p>Bienvenue sur votre espace client !</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="tab-wrapper mb-1">
                                        <ul class="tabs">
                                            <li class="tab-link active" data-tab="1">Espace Prestataires et Assureurs
                                            </li>
                                            <li class="tab-link" data-tab="2">Espace client</li>
                                        </ul>
                                    </div>
                                    <div class="content-wrapper" id="card-container">
                                        <div id="tab-1" class="tabs-content active">
                                            <div class="app-divider-v light justify-content-center mb-1">
                                                <p>Espace Prestataires de santé et Assureurs</p>
                                            </div>
                                            <form method="POST" action="{{ url('/connexion') }}"
                                                class="needs-validation" novalidate
                                                onsubmit="return validateForm(event)">
                                                @csrf
                                                @if (session('api_error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('api_error') }}
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-12">
                                                        @if ($errors->has('code_structure'))
                                                            <div class="text-danger mt-1">
                                                                {{ $errors->first('code_structure') }}</div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="code_structure"
                                                                name="code_structure" placeholder="Code structure"
                                                                value="{{ old('code_structure') }}" type="text"
                                                                required>
                                                            <label for="code_structure">Code structure</label>
                                                            <div class="invalid-feedback">
                                                                Ce champ est requis.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        @if ($errors->has('email'))
                                                            <div class="text-danger mt-1">
                                                                {{ $errors->first('email') }}</div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="email" name="email"
                                                                placeholder="Email" required
                                                                value="{{ old('email') }}" type="text">
                                                            <label for="email">Email</label>
                                                            <div class="invalid-feedback">
                                                                Ce champ est requis.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        @if ($errors->has('password'))
                                                            <div class="text-danger mt-1">
                                                                {{ $errors->first('password') }}</div>
                                                        @endif
                                                        <div class="row align-items-center">
                                                            <div class="col-md-10 col-sm-10">
                                                                <div class="form-floating mb-3">
                                                                    <input type="password" class="form-control"
                                                                        id="password1" name="password"
                                                                        placeholder="Mot de passe" required
                                                                        value="{{ old('password') }}">
                                                                    <label for="password">Mot de passe</label>
                                                                    <div class="invalid-feedback">
                                                                        Veuillez saisir votre mot de passe.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 text-right">
                                                                <span onclick="togglePassword()"
                                                                    style="cursor: pointer;">
                                                                    <i id="togglePwd1"
                                                                        class="fa-solid fa-eye fa-xl text-white" style="font-size: 35px"></i>
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check d-flex align-items-center gap-2 mb-3">
                                                            <input class="form-check-input w-25 h-25"
                                                                id="checkDefault" type="checkbox" value="">
                                                            <label
                                                                class="form-check-label text-white mt-2 f-s-16 text-dark"
                                                                for="checkDefault">
                                                                Accept Terms & Conditions
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <button class="btn btn-primary w-100" type="submit" >Se connecter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab-2" class="tabs-content">
                                            <form method="POST" action="{{ url('/connexion') }}"
                                                class="needs-validation" novalidate
                                                onsubmit="return validateForm(event)">
                                                @csrf
                                                @if (session('api_error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('api_error') }}
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-12">
                                                        @if ($errors->has('code_structure'))
                                                            <div class="text-danger mt-1">
                                                                {{ $errors->first('code_structure') }}</div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="UserName"
                                                                placeholder="Identifiant client" type="text">
                                                            <label for="UserName">Username</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="email"
                                                                placeholder="Enter Your Email" required
                                                                type="email">
                                                            <label for="email">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="password"
                                                                placeholder="Enter Your Password" required
                                                                type="password">
                                                            <label class="form-label" for="password">Password</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="password1"
                                                                placeholder="Enter Your Password" required
                                                                type="password">
                                                            <label class="form-label" for="password1">Confirm
                                                                Password</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check d-flex align-items-center gap-2 mb-3">
                                                            <input class="form-check-input w-25 h-25"
                                                                id="checkDefault" type="checkbox" value="">
                                                            <label
                                                                class="form-check-label text-white mt-2 f-s-16 text-dark"
                                                                for="checkDefault">
                                                                Accept Terms & Conditions
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <a class="btn btn-primary w-100" href="index.html"
                                                                role="button">Sign
                                                                Up</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="text-center text-lg-start f-w-500">
                                                            Already Have A Account? <a
                                                                class="text-white-800 text-decoration-underline"
                                                                href="sign_in.html"> Sign in</a>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="app-divider-v light justify-content-center py-lg-5 py-3">
                                                        <p>OR</p>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="d-flex gap-3 justify-content-center text-center">
                                                            <button
                                                                class="btn btn-light-white  icon-btn w-45 h-45 b-r-15 "
                                                                type="button">
                                                                <i class="ph-bold ph-facebook-logo f-s-20"></i>
                                                            </button>
                                                            <button
                                                                class="btn btn-light-white  icon-btn w-45 h-45 b-r-15 "
                                                                type="button">
                                                                <i class="ph-bold  ph-google-logo f-s-20"></i>
                                                            </button>
                                                            <button
                                                                class="btn btn-light-white  icon-btn w-45 h-45 b-r-15 "
                                                                type="button">
                                                                <i class="ph-bold  ph-twitter-logo f-s-20"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sign up end -->
        </div>
    </div>


<script>
    function togglePassword() {
        const input = document.getElementById("password1");
        const icon = document.getElementById("togglePwd1");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
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
</body>

<!-- Mirrored from phplaravel-1384472-5380003.cloudwaysapps.com/sign_up by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jun 2025 02:03:15 GMT -->

</html>
