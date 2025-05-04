<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Redirection simulée (facultatif)
Route::get('/redirect', function () {
    return redirect()->route('prestataire.dashboard'); // temporairement fixe
});
Route::post('/connexion', [App\Http\Controllers\Api\UserController::class, 'loginToExternalApi']);

// =======================
// SECTION PRESTATAIRES
// =======================
// PRESTATAIRE
Route::prefix('prestataire')->name('prestataire.')->middleware('check.prestataire')->group(function () {
    Route::view('/dashboard', 'prestataires.dashboard')->name('dashboard');
    Route::view('/verification', 'prestataires.verification.index')->name('verification');
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

// ASSUREUR
Route::prefix('assureur')->name('assureur.')->middleware('check.assureur')->group(function () {
    Route::view('/dashboard', 'assureurs.dashboard')->name('dashboard');
    Route::view('/contrats', 'assureurs.contrats.index')->name('contrats');
    Route::view('/assures', 'assureurs.assures.index')->name('assures');
    Route::view('/primes', 'assureurs.primes.index')->name('primes');
    Route::view('/sinistres', 'assureurs.sinistres.index')->name('sinistres');
    Route::view('/prestataires', 'assureurs.prestataires.index')->name('prestataires');
    Route::view('/prises-en-charge', 'assureurs.prises-en-charge.index')->name('prises');
    Route::view('/reporting', 'assureurs.reporting.index')->name('reporting');
    Route::view('/documents', 'assureurs.documents.index')->name('documents');
    Route::view('/communication', 'assureurs.communication.messagerie')->name('communication');
    Route::view('/conformite', 'assureurs.conformite.controles')->name('conformite');
    Route::view('/administration', 'assureurs.administration.utilisateurs')->name('administration');
    Route::view('/integration', 'assureurs.integration.api')->name('integration');
});

// CLIENT
Route::prefix('client')->name('client.')->middleware('check.client')->group(function () {
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
