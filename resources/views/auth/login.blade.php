<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion | Mon Assurance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('imgs/icon_logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('imgs/icon_logo.png') }}" type="image/x-icon">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
        }

        .glass-card {
            z-index: 2;
            background: none;
            box-shadow: none;
            border-radius: 5px;
            border: 2px solid #fff;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            position: relative;
        }


        .right-block {
            background: #fff !important;
            border-radius: 5px 5px 5px 5px !important;
            box-shadow: none;
            /* border-left: 1.5px solid rgba(255, 255, 255, 0.25); */
        }


        .icon-circle {
            background: #fff;
            color: #5e2d17;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 18px;
        }

        .btn-brown {
            background: #5e2d17;
            color: #fff;
            border: none;
            border-radius: 7px;
        }

        .btn-brown:hover {
            background: #6b431e;
            color: #fff;
        }

        .input-group-lg>.form-control,
        .input-group-lg>.input-group-text {
            font-size: 1.14rem;
            border: 1px solid #5e2d17;
            border-radius: 0.5px;
        }

        .form-label {
            margin-bottom: 0.45rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .transparent-block {
            background: rgba(255, 255, 255, 0.075);
            border: 1px solid #fff;
            border-radius: 5px;
            padding: 28px 28px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.13);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 900px) {
            .glass-card {
                flex-direction: column;
            }


            .right-block {
                border-radius: 5px 5px 0 0 !important;
                min-width: unset;
                max-width: unset;
            }

            .right-block {
                border-radius: 0 0 18px 18px !important;
            }
        }

        @media (max-width: 600px) {
            .glass-card {
                box-shadow: none;
            }


            .right-block {
                padding: 24px 10px !important;
            }
        }

        .shadowInput {
            box-shadow: none !important;
            /* Couleur neutre */
            outline: none;
            transition: none;
        }

        .shadowInput:focus {
            box-shadow: none !important;
            outline: none !important;
        }
    </style>
    <!-- Nav tabs -->
    <style>
        .nav-tabs .nav-link {
            color: #5e2d17;
            border: 1px solid #5e2d17;
            background-color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            background-color: #f0e6e2;
            color: #5e2d17;
        }

        .nav-tabs .nav-link.active {
            background-color: #5e2d17;
            color: white;
            font-weight: bold;
            border-color: #5e2d17 #5e2d17 #fff;
        }

        .nav-tabs {
            border-bottom: none;
        }
    </style>
</head>

<body
    style="background: linear-gradient(#5e2d177c, #54422f),
url('{{ asset('/imgs/login1.png') }}') no-repeat center center;
background-size: cover;
background-attachment: fixed;
color: #fff;">

    <div class="login-container">
        <div class="transparent-block">
            <div class="d-flex flex-row  p-4" style="overflow: hidden;">
                <!-- Bloc gauche (identité) -->
                <div class=" d-flex flex-column justify-content-center align-items-center"
                    style="min-width:440px;max-width:480px;padding:48px 32px;">
                    <div class="icon-circle mb-3"
                        style="background:#fff;color:#5e2d17;width:64px;height:64px;font-size:2.5rem;">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="px-4 py-2 rounded shadow-sm mb-3"
                        style="display:inline-block;background:rgb(255, 255, 255);">
                        <span class="fw-bold" style="font-size:2rem;color:#5e2d17;letter-spacing:1px;">Espace
                            sécurisé</span>
                    </div>
                    <div class="fw-semibold text-white text-center mb-2" style="font-size:1.05rem;">Bienvenue sur votre
                        plateforme</div>
                    <div class="text-white text-center" style="font-size:0.98rem;">Assureurs,Prestataires de Santé et
                        Clients
                        Veuillez vous connecter pour accéder à votre espace.</div>
                </div>
                <!-- Bloc droit (connexion) -->
                <div class="right-block d-flex flex-column justify-content-center"
                    style="padding:48px 40px;min-width:500px;max-width:400px;background:#fff;">
                    <h4 class="fw-bold mb-4 text-center" style="color:#5e2d17;font-size:3rem;">Connexion</h4>
                    @if (session('api_error'))
                        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                            {{ session('api_error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer">
                            </button>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer">
                            </button>
                        </div>
                    @endif
                    <ul class="nav nav-tabs mb-4" id="beneficiaireTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="physique-tab" data-bs-toggle="tab"
                                data-bs-target="#physique-pane" type="button" role="tab"
                                aria-controls="physique-pane" aria-selected="true" style="font-size:15px">
                                Espace Prestataires et Assureurs
                            </button>
                        </li>
                        <li class="nav-item" role="presentation" style="margin-left: 12px;">
                            <button class="nav-link" id="morale-tab" data-bs-toggle="tab" data-bs-target="#morale-pane"
                                type="button" role="tab" aria-controls="morale-pane" aria-selected="false"
                                style="font-size:15px">
                                Espace client
                            </button>
                        </li>
                    </ul>


                    <div class="tab-content mb-3">
                        <div class="tab-pane fade show active" id="physique-pane" role="tabpanel"
                            aria-labelledby="physique-tab">
                            <form method="POST" action="{{ url('/connexion') }}" class="needs-validation" novalidate
                                onsubmit="return validateForm(event)">
                                @csrf
                                <div class="mb-3">
                                    @if ($errors->has('code_structure'))
                                        <div class="text-danger mt-1">{{ $errors->first('code_structure') }}</div>
                                    @endif
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-white border-end-0">X</span>
                                        <input type="text" id="code_structure" name="code_structure"
                                            value="{{ old('code_structure') }}" class="form-control shadowInput"
                                            placeholder="Code structure" required autocomplete="false">
                                        <div class="invalid-feedback">
                                            Ce champ est requis.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-white border-end-0"><i
                                                class="bi bi-person"></i></span>
                                        <input type="text" id="email" name="email"
                                            value="{{ old('email') }}" class="form-control shadowInput"
                                            placeholder="Identifiant" required autocomplete="false">
                                        <div class="invalid-feedback">
                                            Ce champ est requis.
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="text-danger mt-1">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-white border-end-0"><i
                                                class="bi bi-lock"></i></span>
                                        <input type="password" id="password" name="password"
                                            class="form-control shadowInput" placeholder="Mot de passe" required
                                            autocomplete="false">
                                        <span class="input-group-text bg-white" style="cursor:pointer"
                                            onclick="togglePassword()"><i class="bi bi-eye"
                                                id="togglePwd"></i></span>
                                        <div class="invalid-feedback">
                                            Veuillez saisir votre identifiant.
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="text-danger mt-1">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="form-check mb-3" style="color:#5e2d17;font-size:0.98rem;">
                                    <!-- Champ caché pour forcer la valeur à 0 si décoché -->
                                    <input type="hidden" name="version_test" value="0">

                                    <!-- Checkbox (valeur 1 si coché) -->
                                    <input class="form-check-input shadow" type="checkbox" name="version_test"
                                        id="version_test1" value="1">
                                    <label class="form-check-label fw-semibold" for="version_test1">
                                        Se connecter en version test.
                                    </label>
                                </div>

                                <div class="d-grid mb-2 mt-4">
                                    <!-- Bouton principal -->
                                    <button type="submit" id="btnSubmit" class="btn btn-brown btn-lg fw-bold"
                                        onclick="handleSubmit(event)">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
                                    </button>

                                    <!-- Bouton de chargement (masqué au début) -->
                                    <button type="button" id="btnLoading"
                                        class="btn btn-secondary btn-lg fw-bold d-none" disabled>
                                        <span class="spinner-border spinner-border-sm me-2" role="status"
                                            aria-hidden="true"></span>
                                        Connexion en cours...
                                    </button>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="#" class="text-decoration-none"
                                        style="color:#5e2d17;font-size:0.98rem;">Mot
                                        de
                                        passe oublié ?</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="morale-pane" role="tabpanel" aria-labelledby="morale-tab">
                            <form method="POST" action="{{ url('/connexionClient') }}" class="needs-validation"
                                novalidate onsubmit="return validateForm(event)">
                                @csrf

                                <div class="mb-3">
                                    @if ($errors->has('identifiant'))
                                        <div class="text-danger mt-1">{{ $errors->first('identifiant') }}</div>
                                    @endif
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-white border-end-0"><i
                                                class="bi bi-person"></i></span>
                                        <input type="text" id="identifiant" name="identifiant"
                                            value="{{ old('identifiant') }}" class="form-control shadowInput"
                                            placeholder="Identifiant" required autocomplete="false">
                                        <div class="invalid-feedback">
                                            Ce champ est requis.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    @if ($errors->has('mot_de_passe'))
                                        <div class="text-danger mt-1">{{ $errors->first('mot_de_passe') }}</div>
                                    @endif
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-white border-end-0"><i
                                                class="bi bi-lock"></i></span>
                                        <input type="password" id="password1" name="mot_de_passe"
                                            class="form-control shadowInput" placeholder="Mot de passe" required
                                            autocomplete="false">
                                        <span class="input-group-text bg-white" style="cursor:pointer"
                                            onclick="togglePassword1()"><i class="bi bi-eye"
                                                id="togglePwd1"></i></span>
                                        <div class="invalid-feedback">
                                            Veuillez saisir votre identifiant.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-3" style="color:#5e2d17;font-size:0.98rem;">
                                    <!-- Champ caché pour forcer la valeur à 0 si décoché -->
                                    <input type="hidden" name="version_test" value="0">

                                    <!-- Checkbox (valeur 1 si coché) -->
                                    <input class="form-check-input shadow" type="checkbox" name="version_test"
                                        id="version_test" value="1">
                                    <label class="form-check-label fw-semibold" for="version_test">
                                        Se connecter en version test.
                                    </label>
                                </div>
                                <div class="d-grid mb-2 mt-4">
                                    <!-- Bouton principal -->
                                    <button type="submit" id="btnSubmit2" class="btn btn-brown btn-lg fw-bold"
                                        onclick="handleSubmit2(event)">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
                                    </button>

                                    <!-- Bouton de chargement (masqué au début) -->
                                    <button type="button" id="btnLoading2"
                                        class="btn btn-secondary btn-lg fw-bold d-none" disabled>
                                        <span class="spinner-border spinner-border-sm me-2" role="status"
                                            aria-hidden="true"></span>
                                        Connexion en cours...
                                    </button>
                                </div>

                                <div class="text-center mt-4 d-flex justify-content-between">
                                    <a href="{{ route('identifiantCompte') }}" class="text-decoration-none"
                                        style="color:#5e2d17;font-size:0.98rem;">Activation du compte</a>
                                    <a href="{{ route('identifiantCompte') }}" class="text-decoration-none"
                                        style="color:#5e2d17;font-size:0.98rem;">Mot de passe oublié ?</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function handleSubmit2(event) {
            event.preventDefault();

            const form = event.target.closest('form');
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return false;
            }

            const btnSubmit = document.getElementById('btnSubmit2');
            const btnLoading = document.getElementById('btnLoading2');

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


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('togglePwd');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                pwd.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        function togglePassword1() {
            const pwd = document.getElementById('password1');
            const icon = document.getElementById('togglePwd1');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                pwd.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>
