<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiaireController extends Controller
{
    //
    public function index(){
        return view('clients.beneficiaire');
    }
}
