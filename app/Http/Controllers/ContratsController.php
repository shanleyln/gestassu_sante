<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function contrat_assureur()
    {
        return  view('assureurs.contrats');
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
