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

        // Appel API
        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/liste_contrat', [
            'assureur_id' => $idAssureur,
        ]);

        // Vérifie si l'appel est un succès
        if ($response->successful()) {
            $reponseContrats = $response->json();
            $contrats = $reponseContrats['contrats'];
            return view('assureurs.contrats', ['contrats' => $contrats]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des contrats.']);
        }
    }
    public function contrat_assureurDetails($contrat)
    {
        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/detail_contrat', [
            'contrat_id' => $contrat,
        ]);

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
    // Controller
    public function police_assureurDetails($police)
    {
        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/detail_police', [
            'police_id' => $police,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            $police = $data['police'] ?? [];
            $contrat = $data['contrat'] ?? [];
            $beneficiaires = $data['beneficiaires'] ?? [];

            return view('assureurs.detailsPolice', [
                'police' => $police,
                'contrat' => $contrat,
                'beneficiaires' => $beneficiaires
            ]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des détails.']);
        }
    }
}
