<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BeneficiaireController extends Controller
{
     
    //
    public function index(){
        return view('clients.beneficiaire');
    }

    public function create(){
        return view('clients.enregistrement_beneficiaire');
    }
}
