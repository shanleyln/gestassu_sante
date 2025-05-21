<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratsController extends Controller
{
    //
    public function contrat_assureur()
    {
        return  view('assureurs.contrats');
    }
    public function contrat_assureurDetails($contrat)
    {
        return  view('assureurs.detailsContrat');
    }
}
