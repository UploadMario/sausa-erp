<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        // Esta será la vista principal del módulo Farmacia
        return view('pharmacy.index');
    }
}
