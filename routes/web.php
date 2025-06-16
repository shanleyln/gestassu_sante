<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifCarteController;

Route::get('/Guide-ingenium-sante', function () {
    return view('guide');
})->name('guide');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/Newlogin', function () {
    return view('auth.Newlogin');
})->name('Newlogin');
Route::get('/identifiantCompte', function () {
    return view('auth.validationCompte');
})->name('identifiantCompte');
Route::get('/verificationOTP', function () {
    return view('auth.verificationOTP');
})->name('verificationOTP');
Route::get('/mot-de-passe', function () {
    return view('auth.password');
})->name('mot-de-passe');

Route::post('/sendMail', [App\Http\Controllers\sendMailController::class, 'sendVerificationCode'])->name('sendMail');
// Traite la soumission du formulaire de vérification
Route::post('/verification-otp', [App\Http\Controllers\sendMailController::class, 'verifyCode'])->name('verificationOTP.check');

// Gère la demande de renvoi du code (via AJAX)
Route::post('/verification-otp/resend', [App\Http\Controllers\sendMailController::class, 'resendCode'])->name('verificationOTP.resend');
// Redirection simulée (facultatif)
Route::get('/redirect', function () {
    return redirect()->route('prestataire.dashboard'); // temporairement fixe
});
Route::post('/connexion', [App\Http\Controllers\Api\UserController::class, 'loginToExternalApi']);

// =======================
// SECTION PRESTATAIRES
// =======================
// PRESTATAIRE
Route::get('/check', function () {
    dd(Auth::guard('api_user')->check(), Auth::guard('api_user')->user());
});

Route::prefix('prestataire')->name('prestataire.')->group(function () {
    Route::view('/dashboard', 'prestataires.dashboard')->name('dashboard');
    Route::view('/garanties', 'prestataires.garanties.index')->name('garanties');
    Route::view('/prises-en-charge', 'prestataires.prises-en-charge.index')->name('prises');
    Route::view('/factures', 'prestataires.factures.index')->name('factures');
    Route::view('/paiements', 'prestataires.paiements.index')->name('paiements');
    Route::view('/patients', 'prestataires.patients.index')->name('patients');
    Route::view('/documents', 'prestataires.documents.index')->name('documents');
    Route::view('/communication', 'prestataires.communication.messagerie')->name('communication');
    Route::view('/statistiques', 'prestataires.statistiques.index')->name('statistiques');
    Route::view('/parametres', 'prestataires.parametres.profil')->name('parametres');
    Route::view('/support', 'prestataires.support.aide')->name('support');
});
// =======================
// SECTION ASSUREURS
// =======================

Route::middleware('auth:api_user')->group(function () {
    Route::get('/prestataire.actualite', [App\Http\Controllers\DashboardController::class, 'actualite_prestataire'])->name('prestataire.actualite');
    Route::get('/verification', [App\Http\Controllers\VerifCarteController::class, 'index'])->name('verification');
    Route::get('/verification_affiche', [App\Http\Controllers\VerifCarteController::class, 'index_affiche'])->name('verification_affiche');
    Route::post('/identifiant', [App\Http\Controllers\VerifCarteController::class, 'identifiant'])->name('identifiantBeneficiaire');
    Route::get('/assureur.dashboard', [App\Http\Controllers\DashboardController::class, 'dashboardAssureur'])->name('assureur.dashboard');
    Route::get('/assureur.actualite', [App\Http\Controllers\ContratsController::class, 'actualite_assureur'])->name('assureur.actualite');
    Route::get('/assureur.contrats', [App\Http\Controllers\ContratsController::class, 'contrat_assureur'])->name('assureur.contrats');
    Route::get('/assureur.contratsDetails/{contrat}', [App\Http\Controllers\ContratsController::class, 'contrat_assureurDetails'])->name('assureur.contratsDetails');
    Route::get('/assureur.policeDetails/{police}', [App\Http\Controllers\ContratsController::class, 'police_assureurDetails'])->name('assureur.policeDetails');
    
    
    // =======================
    // SECTION CLIENT
    // =======================
    Route::get('/Dashboard', [App\Http\Controllers\ClientController::class, 'index'])->name('client.dashboard');
    Route::get('/beneficiaires', [App\Http\Controllers\BeneficiaireController::class, 'index'])->name('clients.beneficiaires');




    Route::get('/Guide-ingenium', function () {
    return view('guide_connexion');
})->name('guide_connexion');
});


// =======================
// SECTION CLIENTS
// =======================
Route::prefix('client')->name('client.')->group(function () {
    Route::view('/dashboard', 'clients.dashboard')->name('dashboard');
    Route::view('/contrats', 'clients.contrats.index')->name('contrats');
    Route::view('/beneficiaires', 'clients.beneficiaires.index')->name('beneficiaires');
    Route::view('/cartes', 'clients.cartes.index')->name('cartes');
    Route::view('/garanties', 'clients.garanties.index')->name('garanties');
    Route::view('/prestations', 'clients.prestations.index')->name('prestations');
    Route::view('/declarations', 'clients.declarations.sinistre')->name('declarations');
    Route::view('/paiements', 'clients.paiements.index')->name('paiements');
    Route::view('/documents', 'clients.documents.index')->name('documents');
    Route::view('/demarches', 'clients.demarches.index')->name('demarches');
    Route::view('/communication', 'clients.communication.messagerie')->name('communication');
    Route::view('/parametres', 'clients.parametres.profil')->name('parametres');
    Route::view('/support', 'clients.support.faq')->name('support');
    Route::view('/analyse', 'clients.analyse.tableau-de-bord')->name('analyse');
    Route::view('/mobile', 'clients.mobile.version-mobile')->name('mobile');
});
Route::post('/logout', [UserController::class, 'destroy'])->name('logout');



//les bonnes routes
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;

// // Page d'accueil / Login
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // Redirection après login selon rôle
// Route::get('/redirect', function () {
//     $user = auth()->user();
//     if ($user->hasRole('prestataire')) {
//         return redirect()->route('prestataire.dashboard');
//     }
//     if ($user->hasRole('assureur')) {
//         return redirect()->route('assureur.dashboard');
//     }
//     if ($user->hasRole('client_moral') || $user->hasRole('client_physique')) {
//         return redirect()->route('client.dashboard');
//     }
//     abort(403);
// })->middleware('auth')->name('redirect');



// /* ------------------------------------------
// | ROUTES ESPACE PRESTATAIRES
// ------------------------------------------- */
// Route::middleware(['auth', 'role:prestataire'])->prefix('prestataire')->name('prestataire.')->group(function () {
//     Route::get('/dashboard', fn () => view('prestataires.dashboard'))->name('dashboard');

//     Route::view('verification', 'prestataires.verification.index')->name('verification');
//     Route::view('garanties', 'prestataires.garanties.index')->name('garanties');
//     Route::view('prises-en-charge', 'prestataires.prises-en-charge.index')->name('prises');
//     Route::view('factures', 'prestataires.factures.index')->name('factures');
//     Route::view('paiements', 'prestataires.paiements.index')->name('paiements');
//     Route::view('patients', 'prestataires.patients.index')->name('patients');
//     Route::view('documents', 'prestataires.documents.index')->name('documents');
//     Route::view('communication', 'prestataires.communication.messagerie')->name('communication');
//     Route::view('statistiques', 'prestataires.statistiques.index')->name('statistiques');
//     Route::view('parametres', 'prestataires.parametres.profil')->name('parametres');
//     Route::view('support', 'prestataires.support.aide')->name('support');
// });


// /* ------------------------------------------
// | ROUTES ESPACE ASSUREURS
// ------------------------------------------- */
// Route::middleware(['auth', 'role:assureur'])->prefix('assureur')->name('assureur.')->group(function () {
//     Route::get('/dashboard', fn () => view('assureurs.dashboard'))->name('dashboard');

//     Route::view('contrats', 'assureurs.contrats.index')->name('contrats');
//     Route::view('assures', 'assureurs.assures.index')->name('assures');
//     Route::view('primes', 'assureurs.primes.index')->name('primes');
//     Route::view('sinistres', 'assureurs.sinistres.index')->name('sinistres');
//     Route::view('prestataires', 'assureurs.prestataires.index')->name('prestataires');
//     Route::view('prises-en-charge', 'assureurs.prises-en-charge.index')->name('prises');
//     Route::view('reporting', 'assureurs.reporting.index')->name('reporting');
//     Route::view('documents', 'assureurs.documents.index')->name('documents');
//     Route::view('communication', 'assureurs.communication.messagerie')->name('communication');
//     Route::view('conformite', 'assureurs.conformite.controles')->name('conformite');
//     Route::view('administration', 'assureurs.administration.utilisateurs')->name('administration');
//     Route::view('integration', 'assureurs.integration.api')->name('integration');
// });


// /* ------------------------------------------
// | ROUTES ESPACE CLIENTS
// ------------------------------------------- */
// Route::middleware(['auth', 'role:client_moral|client_physique'])->prefix('client')->name('client.')->group(function () {
//     Route::get('/dashboard', fn () => view('clients.dashboard'))->name('dashboard');

//     Route::view('contrats', 'clients.contrats.index')->name('contrats');
//     Route::view('beneficiaires', 'clients.beneficiaires.index')->name('beneficiaires');
//     Route::view('cartes', 'clients.cartes.index')->name('cartes');
//     Route::view('garanties', 'clients.garanties.index')->name('garanties');
//     Route::view('prestations', 'clients.prestations.index')->name('prestations');
//     Route::view('declarations', 'clients.declarations.sinistre')->name('declarations');
//     Route::view('paiements', 'clients.paiements.index')->name('paiements');
//     Route::view('documents', 'clients.documents.index')->name('documents');
//     Route::view('demarches', 'clients.demarches.index')->name('demarches');
//     Route::view('communication', 'clients.communication.messagerie')->name('communication');
//     Route::view('parametres', 'clients.parametres.profil')->name('parametres');
//     Route::view('support', 'clients.support.faq')->name('support');
//     Route::view('analyse', 'clients.analyse.tableau-de-bord')->name('analyse');
//     Route::view('mobile', 'clients.mobile.version-mobile')->name('mobile');
// });
