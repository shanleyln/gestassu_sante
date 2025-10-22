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


        if (session()->has('version_test')) {
            // Appel API
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api_test/espace_partenaire/liste_contrat', [
                'assureur_id' => $idAssureur,
            ]);
        } else {
            // Appel API
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/liste_contrat', [
                'assureur_id' => $idAssureur,
            ]);
        }
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


        if (session()->has('version_test')) {
            // Appel API
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api_test/espace_client/liste_contrat', [
                "Personne_Morale_ID" => $id_souscripteur_pm,
                "Personne_Physique_ID" => $id_souscripteur_pp,
                "numero_contrat" => "",
                "type_contrat" => "",
                "statut" => "",
                "nom_assureur" => ""
            ]);
        } else {
            // Appel API
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api/espace_client/liste_contrat', [
                "Personne_Morale_ID" => $id_souscripteur_pm,
                "Personne_Physique_ID" => $id_souscripteur_pp,
                "numero_contrat" => "",
                "type_contrat" => "",
                "statut" => "",
                "nom_assureur" => ""
            ]);
        }

        // Vérifie si l'appel est un succès
        if ($response->successful()) {
            $reponseContrats = $response->json();
            $contrats = $reponseContrats['contrats'];
            return view('clients.contrats', ['contrats' => $contrats]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des contrats.']);
        }
    }
    public function contrat_assureurDetails($contrat)
    {
       
        if (session()->has('version_test')) {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api_test/espace_partenaire/detail_contrat', [
                'contrat_id' => $contrat,
            ]);
        } else {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/detail_contrat', [
                'contrat_id' => $contrat,
            ]);
        }
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
        
        if (session()->has('version_test')) {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api_test/espace_partenaire/detail_contrat', [
                'contrat_id' => $contrat,
            ]);
        } else {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/detail_contrat', [
                'contrat_id' => $contrat,
            ]);
        }
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
        
        if (session()->has('version_test')) {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api_test/espace_partenaire/detail_police', [
                'police_id' => $police,
            ]);
        } else {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/detail_police', [
                'police_id' => $police,
            ]);
        }
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
        if (session()->has('version_test')) {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api_test/espace_partenaire/detail_police', [
                'police_id' => $police,
            ]);
        } else {
            $response = Http::withHeaders([
                'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json'
            ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/detail_police', [
                'police_id' => $police,
            ]);
        }
        

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
