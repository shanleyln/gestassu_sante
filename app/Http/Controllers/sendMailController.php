<?php

// Fichier : app/Http/Controllers/sendMailController.php

namespace App\Http\Controllers;

use App\Mail\EnvoiCode;
use App\Models\User; // <-- Important : Importer le modèle User
use Illuminate\Http\Request;
use App\Auth\ApiUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session; // Session est déjà importé par défaut, mais c'est une bonne pratique de le garder si vous l'utilisez explicitement.
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
// car vous utilisez la façade `Mail` de Laravel, ce qui est la bonne approche.

class sendMailController extends Controller
{
    private function sendRequestOTP(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_client/generer_otp', [
            'identifiant' => $request->input('identifiant'),
        ]);
    }

    public function sendVerificationCode(Request $request)
    {
        // ✅ 2. Envoie de la requête vers l’API
        $responseotp = $this->sendRequestOTP($request);
        try {
            // ✅ 3. Gestion du succès
            if ($responseotp->successful()) {
                $userDataOTP = $responseotp->json();
                if (isset($userDataOTP['status']) && $userDataOTP['status'] === 'error') {
                    return back()->withErrors(['identifier' => 'Aucun compte n\'est associé à cet identifiant.']);
                }
                // // Recherche de l'utilisateur par son email
                // $user = User::where('email', $request->identifier)->first();

                // // Si l'utilisateur n'existe pas, on retourne une erreur
                // if (!$user) {
                //     return back()->withErrors(['identifier' => 'Aucun compte n\'est associé à cette adresse email.']);
                // }
                // $OTP = new ApiUser($userDataOTP['message']);
                // dd($OTP);
                // Génération d'un code sécurisé
                // $code = random_int(100000, 999999);
                $expiresAt = now()->addMinutes(10);
                // Stocker les infos en session pour la page suivante
                // Session::put('verification_code', $code);
                Session::put('verification_code_expires_at', $expiresAt);
                Session::put('verification_user_id', $request->input('identifiant'));


                // On envoie l'e-mail à l'utilisateur trouvé.
                // On passe UNIQUEMENT le code au Mailable.
                // Mail::to('yodingenierieia@gmail.com')->send(new EnvoiCode($code));

                // Rediriger vers la page de saisie du code (OTP)
                return redirect()->route('verificationOTP')->with([
                    'success' => 'Un code a été envoyé.',
                    'expires_at' => $expiresAt
                ]);
            }
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
    private function verifyCodeRequest(Request $request): \Illuminate\Http\Client\Response
    {
        $otpDigits = $request->input('otp_digits');

        // 2. Vérifier que les données sont bien un tableau (sécurité)
        // if (is_array($otpDigits)) {

            // 3. Joindre les éléments du tableau pour former une chaîne de caractères
            // $otpCode contiendra : "123456"
            $otpCode = implode('', $otpDigits);

            // 4. (Optionnel) Si vous avez besoin de le manipuler comme un nombre
            $otpNumber = (int)$otpCode; // $otpNumber contiendra l'entier 123456

            // Le code est correct
            return Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api/espace_client/verifie_otp', [
                'identifiant' => $request->input('identifiant', Session::get('verification_user_id')), // ou passe 'identifiant' en session si besoin
                'receive_otp' => $otpNumber, // ou passe 'identifiant' en session si besoin
            ]);
        // }
    }
    public function verifyCode(Request $request)
    {
        $response = $this->verifyCodeRequest($request);
        try {
            // ✅ 3. Gestion du succès
            if ($response->successful()) {
                $userData = $response->json();
                if (isset($userData['status']) && $userData['status'] === 'error') {
                    return back()->withErrors(['otp_code' => $userData['message']]);
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
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erreur lors de la requête OTP.'], 500);
        }
    }

    /**
     * Renvoie un nouveau code de vérification.
     */

    private function resendRequestOTP(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_client/generer_otp', [
            'identifiant' => $request->input('identifiant', Session::get('verification_user_id')), // ou passe 'identifiant' en session si besoin
        ]);
    }

    public function resendCode(Request $request)
    {
        if (!Session::has('verification_user_id')) {
            return response()->json(['success' => false, 'message' => 'Session invalide. Veuillez recommencer.']);
        }

        try {
            $responseotp = $this->resendRequestOTP($request);

            if ($responseotp->successful()) {
                $userDataOTP = $responseotp->json();

                if (isset($userDataOTP['status']) && $userDataOTP['status'] === 'error') {
                    return response()->json(['success' => false, 'message' => $userDataOTP['message']]);
                }

                $expiresAt = now()->addMinutes(10);
                Session::put('verification_code_expires_at', $expiresAt);
                Session::put('verification_user_id', Session::get('verification_user_id'));


                return response()->json([
                    'success' => true,
                    'message' => 'Nouveau code envoyé avec succès.',
                    'expires_at' => $expiresAt->toIso8601String()
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erreur lors de la requête OTP.'], 500);
        }
    }

    /**
     * Helper pour nettoyer les données de session liées à l'OTP.
     */
    private function clearSession()
    {
        Session::forget(['verification_code', 'verification_code_expires_at']);
    }

    private function ActiveRequestCompte(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_client/active_compte', [
            'identifiant' => $request->input('identifiant', Session::get('user_id_verified')), // ou passe 'identifiant' en session si besoin
            'mot_de_passe' => $request->input('mot_de_passe') // ou passe 'identifiant' en session si besoin
        ]);
    }

    public function CompteActive(Request $request)
    {
        $response = $this->ActiveRequestCompte($request);
        try {
            // ✅ 3. Gestion du succès
            if ($response->successful()) {
                $userData = $response->json();
                if (isset($userData['status']) && $userData['status'] === 'error') {
                    return back()->withErrors(['password' => $userData['message']]);
                }
                // ---- SUCCÈS ----
                // Le code est correct et n'a pas expiré.
                // On nettoie la session pour ne pas pouvoir réutiliser le code.
                $this->clearSession();
                Session::forget('user_id_verified');

                return redirect()->route('login')->with('success', 'Mot de passe réenitialisé avec succès !');
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erreur lors de la requête OTP.'], 500);
        }
    }
}
