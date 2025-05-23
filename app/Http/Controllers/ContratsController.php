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
    public function dashboard()
    {
        return  view('assureurs.dashboard');
    }
    public function contrat_assureur(Request $request)
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
            $contrats = $response->json();
            return view('assureurs.contrats', ['contrats' => $contrats]);
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des contrats.']);
        }
        
    }
    public function contrat_assureurDetails($contrat)
    {
        return  view('assureurs.detailsContrat');
    }
    public function police_assureurDetails($contrat)
    {
        return  view('assureurs.detailsPolice');
    }
}
