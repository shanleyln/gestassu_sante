<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BeneficiaireController extends Controller
{

    //
    public function index($police_id)
    {

        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        // Définition automatique de la base URL
        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        // En-têtes communs
        $headers = [
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ];

        // Appels API
        $responsebeneficiaire = Http::withHeaders($headers)
            ->get("$baseUrl/espace_client/liste_famille_temp/$police_id");

        $response = Http::withHeaders($headers)
            ->post("$baseUrl/espace_partenaire/detail_police", [
                'police_id' => $police_id,
            ]);



        if ($response->successful() && $responsebeneficiaire->successful()) {
            $data = $response->json();
            $dataBeneficiaire = $responsebeneficiaire->json();

            $police = $data['police'] ?? [];
            $contrat = $data['contrat'] ?? [];
            $contrat_id = $contrat['id'] ?? null;
            return view('clients.beneficiaire', [
                'police' => $police,
                'contrat' => $contrat,
                'contrat_id' => $contrat_id,
                'beneficiaires_temp' => $dataBeneficiaire['familles'] ?? []
            ]);
        } elseif ($responsebeneficiaire->failed()) {
            // Gérer l'erreur de récupération des bénéficiaires
            return back()->withErrors(['erreur' => 'Échec de récupération des bénéficiaires.']);
        } else {
            // Gérer l'erreur de récupération des bénéficiaires
            return back()->withErrors(['erreur' => 'Échec de récupération des bénéficiaires.']);
        }
    }

    public function create($police_id)
    {
        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);
        // Vérifie la session et choisit automatiquement l’URL
        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ])->post("$baseUrl/espace_partenaire/detail_police", [
            'police_id' => $police_id,
        ]);



        if ($response->successful()) {
            $data = $response->json();

            $police = $data['police'] ?? [];
            $contrat = $data['contrat'] ?? [];
            $beneficiaires = $data['beneficiaires'] ?? [];
            $contrat_id = $contrat['id'] ?? null;
            return view('clients.enregistrement_beneficiaire', [
                'police' => $police,
                'contrat' => $contrat,
                'contrat_id' => $contrat_id,
                'beneficiaires' => $beneficiaires
            ]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des détails.']);
        }
    }

    public function save_beneficiaire(Request $request)
    {
        // Étape 1 : Valider les données
        $validated = $request->validate([
            'police_id' => 'required|uuid',
            'beneficiaires' => 'required|array|min:1',
            'beneficiaires.*.nom' => 'required|string|max:255',
            'beneficiaires.*.prenom' => 'required|string|max:255',
            'beneficiaires.*.date_naissance' => 'required|date',
            'beneficiaires.*.genre' => 'required|in:Masculin,Feminin',
            'beneficiaires.*.lien_avec_assure' => 'required|string',
            'beneficiaires.*.nom_rue' => 'required|string|max:255',
            'beneficiaires.*.profession' => 'required|string|max:255',
            'beneficiaires.*.email' => 'nullable|email',
            'beneficiaires.*.telephone' => 'nullable|string|max:30',

            // Champs facultatifs
            'beneficiaires.*.numero_securite_sociale' => 'nullable|string|max:50',
            'beneficiaires.*.numero_rue' => 'nullable|string|max:50',
            'beneficiaires.*.code_postal' => 'nullable|string|max:10',
        ]);
        // Récupération des messages d'erreur de validation, s'il y en a
        if ($errors = $request->session()->get('errors')) {
            $messages = $errors->all();
            return response()->json([
                'success' => false,
                'errors' => $messages
            ], 422);
        }
        // Étape 2 : Construire l'objet JSON
        $data = [
            'polices_id' => $validated['police_id'],
            'created_by' => \Illuminate\Support\Facades\Auth::guard('api_user')->user()->id ?? '', // ou '' si non connecté
            'beneficiaires' => [],
        ];

        foreach ($validated['beneficiaires'] as $beneficiaire) {
            $data['beneficiaires'][] = [
                'nom' => $beneficiaire['nom'],
                'prenom' => $beneficiaire['prenom'],
                'date_naissance' => $beneficiaire['date_naissance'],
                'numero_securite_sociale' => $beneficiaire['numero_securite_sociale'] ?? '',
                'genre' => $beneficiaire['genre'],
                'profession' => $beneficiaire['profession'],
                'email' => $beneficiaire['email'] ?? '',
                'telephone' => $beneficiaire['telephone'] ?? '',
                'numero_rue' => $beneficiaire['numero_rue'] ?? '',
                'nom_rue' => $beneficiaire['nom_rue'],
                'code_postal' => $beneficiaire['code_postal'] ?? '',
                'ville_id' => 'b9c374ff-5b86-478e-be62-0cc258f126e5',
                'pays_id' => 'dd4fbce3-0a6c-11f0-9f80-005056039bc7',
                'est_assure_principal' => $beneficiaire['lien_avec_assure'] === 'Principal',
                'lien_avec_assure' => $beneficiaire['lien_avec_assure'],
            ];
        }
        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);
        // Détermine la base URL selon la session
        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        // Appel API
        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ])->post("$baseUrl/espace_client/save_famille", $data);


        if ($response->successful()) {
            // Étape 3 : Rediriger en arrière avec un message de succès
            return back()->with('success', 'Les bénéficiaires ont été enregistrés avec succès.');
        } else {
            return back()->withErrors(['error' => 'Erreur lors de l\'enregistrement des bénéficiaires.']);
        }
    }
}
