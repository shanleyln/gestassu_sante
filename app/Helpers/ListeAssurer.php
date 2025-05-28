<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ListeAssurer
{
    public static function assurer_physique()
    {
        // Récupérer l'ID
        $idAssureur = Auth::guard('api_user')->user()->id_assureur;

        // Appel API
        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/assurer_physique', [
            'assureur_id' => $idAssureur,
        ]);

        // Vérifie si l'appel est un succès
        if ($response->successful()) {
            $reponseContrats = $response->json();
            $dataPhysique = $reponseContrats['Assurer_physique'] ?? [];
            return  $dataPhysique;
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des assurés physique.']);
        }
    }
    public static function assurer_moral()
    {
        // Récupérer l'ID
        $idAssureur = Auth::guard('api_user')->user()->id_assureur;
        // Appel API
        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/assurer_moral', [
            'assureur_id' => $idAssureur,
        ]);

        // Vérifie si l'appel est un succès
        if ($response->successful()) {
            $reponseContrats = $response->json();
            $dataMorale = $reponseContrats['Assurer_moral'] ?? [];

            $dataFocauxAll = [];

            foreach ($dataMorale as $key => $value) {
                $response2 = Http::withHeaders([
                    'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                    'Content-Type' => 'application/json'
                ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/point_focal', [
                    'Personne_Morale_ID' => $value['personne_morale_id'],
                ]);

                if ($response2->successful()) {
                    $dataFocauxAll[] = $response2->json()['Point_focal'] ?? [];
                }
            }
            return [
                'dataMorale' => $dataMorale,
                'dataFocaux' => array_merge(...$dataFocauxAll),
            ];
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des assurés moral.']);
        }
    }
    public static function point_focaux()
    {
        // Récupérer l'ID
        $idAssureur = Auth::guard('api_user')->user()->id_assureur;
        // Appel API
        $response = Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/espace_partenaire/assurer_moral', [
            'assureur_id' => $idAssureur,
        ]);

        // Vérifie si l'appel est un succès
        if ($response->successful()) {
            $reponseContrats = $response->json();
            $dataMorale = $reponseContrats['Assurer_moral'] ?? [];
            return  $dataMorale;
        } else {
            return back()->withErrors(['erreur' => 'Échec de récupération des assurés moral.']);
        }
    }
}
