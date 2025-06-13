<?php

// Fichier : app/Http/Controllers/sendMailController.php

namespace App\Http\Controllers;

use App\Mail\EnvoiCode;
use App\Models\User; // <-- Important : Importer le modèle User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session; // Session est déjà importé par défaut, mais c'est une bonne pratique de le garder si vous l'utilisez explicitement.

// Note : Les imports de PHPMailer ne sont pas nécessaires
// car vous utilisez la façade `Mail` de Laravel, ce qui est la bonne approche.

class sendMailController extends Controller
{
    public function sendVerificationCode(Request $request)
    {
        // // Il est crucial de valider l'entrée et de trouver l'utilisateur
        // $request->validate([
        //     'identifier' => 'required|email', // Valider comme un email est plus sûr
        // ]);

        // // Recherche de l'utilisateur par son email
        // $user = User::where('email', $request->identifier)->first();

        // // Si l'utilisateur n'existe pas, on retourne une erreur
        // if (!$user) {
        //     return back()->withErrors(['identifier' => 'Aucun compte n\'est associé à cette adresse email.']);
        // }

        // Génération d'un code sécurisé
        $code = random_int(100000, 999999);
        $expiresAt = now()->addMinutes(3);
        // Stocker les infos en session pour la page suivante
        Session::put('verification_code', $code);
        Session::put('verification_code_expires_at', $expiresAt);
        Session::put('verification_user_id', 'jmofhg-momo-565-lgkg');

        try {
            // On envoie l'e-mail à l'utilisateur trouvé.
            // On passe UNIQUEMENT le code au Mailable.
            Mail::to('yodingenierieia@gmail.com')->send(new EnvoiCode($code));

            // Rediriger vers la page de saisie du code (OTP)
            return redirect()->route('verificationOTP')->with([
                'success' => 'Un code a été envoyé.',
                'expires_at' => $expiresAt->format('Y-m-d\TH:i:s')
            ]);
        } catch (\Exception $e) {
            // En cas d'échec de l'envoi
            // Log::error("Mail sending failed: " . $e->getMessage()); // Pensez à logger l'erreur pour le débogage
            return back()->withInput()->withErrors(['mail' => "L'envoi de l'e-mail de vérification a échoué. Veuillez réessayer."]);
        }
    }

    /**
     * Affiche la page de vérification OTP.
     */
    public function showVerificationForm()
    {
        // S'assure que l'utilisateur est bien passé par l'étape précédente
        if (!Session::has('verification_code_expires_at')) {
            return redirect()->route('identifiantCompte')->withErrors('Veuillez d\'abord demander un code de vérification.');
        }
        return view('auth.validationCompte'); // Assurez-vous que le nom du fichier est correct
    }


    /**
     * Vérifie le code OTP soumis par l'utilisateur.
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|numeric|digits:6',
        ]);

        // Vérifier si un code est bien en attente de vérification
        if (!Session::has('verification_code') || !Session::has('verification_code_expires_at')) {
            return back()->withErrors(['otp_code' => 'Votre session a expiré. Veuillez demander un nouveau code.']);
        }

        // Vérifier si le code n'a pas expiré
        if (now()->gt(Session::get('verification_code_expires_at'))) {
            // Le code a expiré, on nettoie la session
            $this->clearSession();
            return back()->withErrors(['otp_code' => 'Le code de vérification a expiré. Veuillez en demander un nouveau.']);
        }

        // Vérifier si le code est correct
        if ((int)$request->otp_code !== (int)Session::get('verification_code')) {
            return back()->withErrors(['otp_code' => 'Le code de vérification est incorrect.']);
        }

        // ---- SUCCÈS ----
        // Le code est correct et n'a pas expiré.
        // On nettoie la session pour ne pas pouvoir réutiliser le code.
        $this->clearSession();

        // Connectez l'utilisateur ou redirigez-le vers la page de réinitialisation du mot de passe
        Session::put('user_id_verified', Session::get('verification_user_id')); // Marquer l'utilisateur comme vérifié
        Session::forget('verification_user_id');

        return redirect()->route('mot-de-passe')->with('success', 'Vérification réussie ! Vous pouvez maintenant réinitialiser votre mot de passe.');
    }

    /**
     * Renvoie un nouveau code de vérification.
     */
    public function resendCode()
    {
        // On s'assure que l'utilisateur a bien une session de vérification active
        if (!Session::has('verification_user_id')) {
            return redirect()->route('identifiantCompte')->withErrors('Session invalide. Veuillez recommencer.');
        }

        // $user = User::find(Session::get('verification_user_id'));
        // if (!$user) {
        //     return redirect()->route('identifiantCompte')->withErrors( 'Utilisateur introuvable.');
        // }

        // Génération du nouveau code
        $code = random_int(100000, 999999);
        $expiresAt = now()->addMinutes(3);

        // Mise à jour de la session
        Session::put('verification_code', $code);
        Session::put('verification_code_expires_at', $expiresAt);

        try {
            Mail::to('yodingenierieia@gmail.com')->send(new EnvoiCode($code));
            return response()->json([
                'success' => true,
                'message' => 'Nouveau code envoyé avec succès.',
                'expires_at' => now()->addMinutes(3)->toIso8601String()
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'L\'envoi du mail a échoué.'], 500);
        }
    }

    /**
     * Helper pour nettoyer les données de session liées à l'OTP.
     */
    private function clearSession()
    {
        Session::forget(['verification_code', 'verification_code_expires_at']);
    }
}
