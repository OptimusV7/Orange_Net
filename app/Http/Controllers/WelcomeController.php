<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $Packages = Package::all();
        return view('welcome', compact('Packages'));
    }
}
