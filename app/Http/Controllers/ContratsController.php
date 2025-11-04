<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ContratsController extends Controller
{
    //
    public function actualite_assureur()
    {
        return  view('assureurs.actualite');
    }
    public function contrat_assureur()
    {
        // Récupérer l'ID
        $idAssureur = Auth::guard('api_user')->user()->id_assureur;

        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        // Détermine la base URL selon le mode
        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        // En-têtes communs
        $headers = [
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ];

        // Appel API
        $response = Http::withHeaders($headers)
            ->post("$baseUrl/espace_partenaire/liste_contrat", [
                'assureur_id' => $idAssureur,
            ]);

        // Vérifie si l'appel est un succès
        if ($response->successful()) {
            $reponseContrats = $response->json();
            // dd($reponseContrats);
            $contrats = $reponseContrats['contrats'] ?? null;
            return view('assureurs.contrats', ['contrats' => $contrats]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des contrats.']);
        }
    }
    public function contrat_client()
    {
        // Récupérer l'ID
        $id_souscripteur_pp = Auth::guard('api_user')->user()->id_souscripteur_pp;
        $id_souscripteur_pm = Auth::guard('api_user')->user()->id_souscripteur_pm;


        // Booléen fiable depuis la session (gère "1", "true", "on", etc.)
        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        // Détermine la base URL selon le mode
        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        // En-têtes communs
        $headers = [
            'X-API-KEY'   => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ];

        // Corps de la requête
        $payload = [
            "Personne_Morale_ID"   => $id_souscripteur_pm,
            "Personne_Physique_ID" => $id_souscripteur_pp,
            "numero_contrat"       => "",
            "type_contrat"         => "",
            "statut"               => "",
            "nom_assureur"         => "",
        ];

        // Appel API (endpoint client)
        $response = Http::withHeaders($headers)
            ->post("$baseUrl/espace_client/liste_contrat", $payload);

        // Vérifie si l'appel est un succès
        if ($response->successful()) {
            $reponseContrats = $response->json();
            $contrats = $reponseContrats['contrats'] ?? null;
            return view('clients.contrats', ['contrats' => $contrats]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des contrats.']);
        }
    }
    public function contrat_assureurDetails($contrat)
    {

        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        $headers = [
            'X-API-KEY'    => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ];

        $payload = [
            'contrat_id' => $contrat,
        ];

        $response = Http::withHeaders($headers)
            // ->timeout(15)->retry(3, 200) // (optionnel) robustesse réseau
            ->post("$baseUrl/espace_partenaire/detail_contrat", $payload);
        if ($response->successful()) {
            $detailsContrats = $response->json();

            $contrat = $detailsContrats['contrat'] ?? [];
            $polices = $detailsContrats['polices'] ?? [];
            $statistiques = $detailsContrats['statistiques'] ?? [];

            return view('assureurs.detailsContrat', [
                'contrat' => $contrat,
                'polices' => $polices,
                'statistiques' => $statistiques
            ]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des détails.']);
        }
    }
    public function contrat_clientDetails($contrat)
    {

        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        $headers = [
            'X-API-KEY'    => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ];

        $payload = [
            'contrat_id' => $contrat,
        ];

        $response = Http::withHeaders($headers)
            // ->timeout(15)->retry(3, 200) // optionnel
            ->post("$baseUrl/espace_partenaire/detail_contrat", $payload);
        if ($response->successful()) {
            $detailsContrats = $response->json();

            $contrat = $detailsContrats['contrat'] ?? [];
            $polices = $detailsContrats['polices'] ?? [];
            $statistiques = $detailsContrats['statistiques'] ?? [];

            return view('clients.detailsContrat', [
                'contrat' => $contrat,
                'polices' => $polices,
                'statistiques' => $statistiques
            ]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des détails.']);
        }
    }
    // Controller
    public function police_assureurDetails($police)
    {

        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        $headers = [
            'X-API-KEY'    => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ];

        $payload = [
            'police_id' => $police,
        ];

        $response = Http::withHeaders($headers)
            // ->timeout(15)->retry(3, 200) // (optionnel) robustesse
            ->post("$baseUrl/espace_partenaire/detail_police", $payload);
        if ($response->successful()) {
            $data = $response->json();

            $police = $data['police'] ?? [];
            $contrat = $data['contrat'] ?? [];
            $beneficiaires = $data['beneficiaires'] ?? [];
            $contrat_id = $contrat['id'] ?? null;
            return view('assureurs.detailsPolice', [
                'police' => $police,
                'contrat' => $contrat,
                'contrat_id' => $contrat_id,
                'beneficiaires' => $beneficiaires
            ]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des détails.']);
        }
    }
    public function police_clientDetails($police)
    {
        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        $baseUrl = $useTest
            ? 'http://45.155.249.99/gestassusante_test/api_test'
            : 'http://45.155.249.99/gestassusante/api';

        $headers = [
            'X-API-KEY'    => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json',
        ];

        $payload = [
            'police_id' => $police,
        ];

        $response = Http::withHeaders($headers)
            // ->timeout(15)->retry(3, 200)->throw() // optionnel
            ->post("$baseUrl/espace_partenaire/detail_police", $payload);


        if ($response->successful()) {
            $data = $response->json();

            $police = $data['police'] ?? [];
            $contrat = $data['contrat'] ?? [];
            $beneficiaires = $data['beneficiaires'] ?? [];
            $contrat_id = $contrat['id'] ?? null;
            return view('clients.detailsPolice', [
                'police' => $police,
                'contrat' => $contrat,
                'contrat_id' => $contrat_id,
                'beneficiaires' => $beneficiaires
            ]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des détails.']);
        }
    }
}
