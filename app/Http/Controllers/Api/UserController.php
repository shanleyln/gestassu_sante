<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use App\Auth\ApiUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginToExternalApi(Request $request)
    {
        // ✅ 1. Validation sécurisée
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ], [
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        // ✅ 2. Envoie de la requête vers l’API
        $response = $this->sendLoginRequest($request);
        // ✅ 3. Gestion du succès
        if ($response->successful()) {
            $userData = $response->json();

            if (isset($userData['status']) && $userData['status'] === 'error') {
                return redirect()->back()
                    ->withInput()
                    ->with('api_error', $userData['message'] ?? 'Erreur de connexion à l’API.');
            }
            session()->forget('userData');
            // Stocker les informations utilisateur dans la session
            // Stocker dans la session pour le provider personnalisé

            $user = new ApiUser($userData['user']);
            // Stocke l'utilisateur dans la session
            session()->put('api_user_' . $user->getAuthIdentifier(), $userData['user']);

            // Login
            Auth::guard('api_user')->login($user);
            // dd(); 
            // Auth::guard('api_user')->check(); // doit retourner true
            // Auth::guard('api_user')->user(); // doit retourner un ApiUser

            if ($user->categorie == "ASSUREUR") {
                return redirect()->route('assureur.actualite');
            } else {
                return redirect()->route('prestataire.dashboard');
            }
        }

        // ✅ 4. Gestion de l’erreur
        return redirect()->back()
            ->withInput()
            ->with('api_error', 'Identifiants incorrects ou erreur de connexion à l’API.');
    }

    private function sendLoginRequest(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/user/login_espace_partenaire', [
            'login' => $request->input('email'),
            'mdp' => $request->input('password'),
            'code_structure' => $request->input('code_structure')
        ]);
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Déconnexion via le guard personnalisé
        Auth::guard('api_user')->logout();

        // Invalider la session actuelle
        $request->session()->invalidate();

        // Regénérer un nouveau token CSRF
        $request->session()->regenerateToken();

        // Rediriger vers la page de connexion
        return redirect('/login');
    }
}
