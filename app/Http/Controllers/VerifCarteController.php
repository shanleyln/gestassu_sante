<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifCarteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        session()->forget('userData');
        return view('prestataires.verification.index');
    }
    public function index_affiche(Request $request)
    {
        $userData = session('userData');
        return view('prestataires.verification.index', compact('userData'));
    }

    public function identifiant(Request $request)
    {

        // ✅ 1. Validation sécurisée
        session()->forget('userData');
        // $matricule = strtoupper($request->input('matricule'));
        // dd($matricule);
        // if (!preg_match('/^[A-Z]{4}-[0-9]{1,}$/', $matricule)) {
        //     return redirect()->back()
        //         ->withInput()
        //         ->withErrors(['matricule' => 'Le format du code est invalide. Utilisez le format ABCD-1.']);
        // }
        // ✅ 1.1. Gestion des messages d'erreur de validation
        if ($errors = $request->get('errors')) {
            return redirect()->back()
                ->withInput()
                ->withErrors($errors);
        }
        // ✅ 2. Envoie de la requête vers l’API

        $useTest = filter_var(session('version_test'), FILTER_VALIDATE_BOOLEAN);

        if ($useTest) {
            $response = $this->sendLoginRequestTest($request);
        } else {
            $response = $this->sendLoginRequest($request);
        }
        // ✅ 3. Gestion du succès
        if ($response->successful()) {
            $userData = $response->json();
            
            // Écraser la session si elle existe déjà
            //    dd($userData);
            // Vérifier si l'utilisateur existe
            if (isset($userData['status']) && $userData['status'] === 'error') {
                return redirect()->back()
                    ->withInput()
                    ->withErrors('Aucun bénéficiaire trouvé ,merci de vérifier le code saisi.');
            }
            // Stocker les informations utilisateur dans la session
            session(['userData' => $userData]);

            return redirect()->route('verification_affiche');
        }
    }

    private function sendLoginRequest(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante/api/beneficiaire/info', [
            'matricule' => $request->input('matricule')
        ]);
    }
    private function sendLoginRequestTest(Request $request): \Illuminate\Http\Client\Response
    {
        return Http::withHeaders([
            'X-API-KEY' => 'AOoEQWP9T5L1CAmeQxFbn8oxiC2ES9EB',
            'Content-Type' => 'application/json'
        ])->post('http://45.155.249.99/gestassusante_test/api_test/beneficiaire/info', [
            'matricule' => $request->input('matricule')
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
