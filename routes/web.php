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
Route::post('/sendPassword', [App\Http\Controllers\sendMailController::class, 'CompteActive'])->name('sendPassword');
// Redirection simulée (facultatif)
Route::get('/redirect', function () {
    return redirect()->route('prestataire.dashboard'); // temporairement fixe
});
Route::post('/connexion', [App\Http\Controllers\Api\UserController::class, 'loginToExternalApi']);
Route::post('/connexionClient', [App\Http\Controllers\Api\UserController::class, 'loginToExternalApiClient']);

// =======================
// SECTION MOBILE
// =======================


Route::get('/connexion', function () {
    return view('auth.mobile.login');
})->name('connexion');

Route::get('/inscription', function () {
    return view('auth.mobile.register');
})->name('inscription');

Route::get('/actualite', function () {
    return view('mobileApp.actualite');
})->name('actualite');
Route::get('/appMobile', function () {
    return view('layouts.appMobile');
})->name('appMobile');
// =======================
// SECTION PRESTATAIRES
// =======================

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
    Route::get('/Dashboard-client', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.dashboard');
    Route::get('/Enregistrement/{police_id}', [App\Http\Controllers\BeneficiaireController::class, 'create'])->name('clients.ajout');
    Route::get('/beneficiaires/{police_id}', [App\Http\Controllers\BeneficiaireController::class, 'index'])->name('clients.beneficiaires');
    Route::get('/clients.contrats', [App\Http\Controllers\ContratsController::class, 'contrat_client'])->name('client.contrats');
    Route::get('/client.contratsDetails/{contrat}', [App\Http\Controllers\ContratsController::class, 'contrat_clientDetails'])->name('client.contratsDetails');
    Route::get('/client.policeDetails/{police}', [App\Http\Controllers\ContratsController::class, 'police_clientDetails'])->name('client.policeDetails');
    Route::post('/saveBeneficiare', [App\Http\Controllers\BeneficiaireController::class, 'save_beneficiaire'])->name('client.beneficiare.save');

    Route::get('/Guide-ingenium', function () {
        return view('guide_connexion');
    })->name('guide_connexion');
});


// =======================
// SECTION CLIENTS
// =======================

Route::post('/logout', [UserController::class, 'destroy'])->name('logout');
