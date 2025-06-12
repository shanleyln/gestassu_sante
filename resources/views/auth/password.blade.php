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
<!--font-awesome-css-->
<link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.css') }}">
<style>
    
</style>
<body>
  <div class="app-wrapper d-block" >
    <div class="">
        <!-- Body main section starts -->
        <main class="w-100 p-0">
            <div class="container-fluid">
                <div class="row">
                    <!-- Verify OTP 1 start -->
                    <div class="col-12 p-0 ">
                        <div class="login-form-container">
                            <div class="mb-4">
                                <a class="logo"  href="#">
                                    {{-- <img alt="#" src="imgs/logo.png" width="150" height="50"> --}}
                                </a>
                            </div>
                            <div class="form_container">
                                <form class="app-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-4 text-center">
                                                <h3 class="text-primary">Réinitialiser votre mot de passe</h3>
                                                <p>Créez un nouveau mot de passe et connectez-vous à l'administrateur</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                @if ($errors->has('password'))
                                                    <div class="text-danger mt-1">{{ $errors->first('password') }}</div>
                                                @endif
                                                <label class="form-label" for="password">Nouveau mot de passe</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="password" id="password" name="password"
                                                        class="form-control shadowInput shadow"
                                                        placeholder="Mot de passe" required>
                                                    <span class="input-group-text bg-white shadow" style="cursor:pointer"
                                                        onclick="togglePassword1()">
                                                        <i id="togglePwd1" class="fa-solid fa-eye fa-xl" style="font-size: 20px"></i>
                                                    </span>
                                                    <div class="invalid-feedback">
                                                        Ce champ est requis.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label" for="confirmepassword">Confirmez le mot de passe</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="password" id="confirmepassword" name="confirmepassword"
                                                        class="form-control shadowInput shadow"
                                                        placeholder="Mot de passe" required>
                                                    <span class="input-group-text bg-white shadow" style="cursor:pointer"
                                                        onclick="togglePassword2()">
                                                        <i id="togglePwd2" class="fa-solid fa-eye fa-xl" style="font-size: 20px"></i>
                                                    </span>
                                                    <div class="invalid-feedback">
                                                        Ce champ est requis.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <a href="{{route('login')}}" class="btn btn-primary w-100">Réinitialiser le mot de passe</a>
                                            </div>
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
    function togglePassword1() {
        const input = document.getElementById("password");
        const icon = document.getElementById("togglePwd1");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }

    function togglePassword2() {
        const input = document.getElementById("confirmepassword");
        const icon = document.getElementById("togglePwd2");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
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
