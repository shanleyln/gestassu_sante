<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    //
    public function actualite_prestataire()
    {
        return  view('prestataires.actualite');
    }
    public function index()
    {

        try {
            return view('prestataire.dashboard');
        } catch (Exception $e) {
            // En cas d'erreur, rediriger en renvoyant un message d'erreur
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function dashboardAssureur()
    {
        $contrats = 0; // valeur par défaut statique
        $souscripteurs = 0; // valeur par défaut
        $contratsActifs = 0; // valeur par défaut
        $echeances = 0; // valeur par défaut
        $assures = 0;
        $primes = 0;
        $sinistres = 0;
        $prestataires = 0;
        $prisesEnCharge = 0;

        try {

            $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

            $baseUrl = $useTest
                ? 'http://45.155.249.99/gestassusante_test/api_test'
                : 'http://45.155.249.99/gestassusante/api';

            $headers = [
                'X-API-KEY'    => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
                'Content-Type' => 'application/json',
            ];

            // On récupère les contrats
            $responseContrats = Http::withHeaders($headers)
                // ->timeout(15)->retry(3, 200) // optionnel
                ->post("$baseUrl/espace_partenaire/liste_contrat", []);
            if ($responseContrats->successful()) {
                $data = $responseContrats->json();
                $contrats = count($data);
                $contratsActifs = collect($data)->where('statut', 'Actif')->count();
                $souscripteurs = collect($data)->pluck('nom_souscripteur')->unique()->count();
                $echeances = collect($data)->filter(function ($contrat) {
                    $echeance = $contrat['date_echeance'] ?? null;
                    if ($echeance) {
                        return \Carbon\Carbon::parse($echeance)->isBetween(now(), now()->addDays(30));
                    }
                    return false;
                })->count();
            }
        } catch (\Exception $e) {
            // journaliser l'erreur si besoin
        }

        return view('assureurs.dashboard', compact(
            'contrats',
            'souscripteurs',
            'contratsActifs',
            'echeances',
            'assures',
            'primes',
            'sinistres',
            'prestataires',
            'prisesEnCharge'
        ));
    }
}
