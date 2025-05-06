<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        try {
            return view('prestataire.dashboard');
        } catch (Exception $e) {
            // En cas d'erreur, rediriger en renvoyant un message d'erreur
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
