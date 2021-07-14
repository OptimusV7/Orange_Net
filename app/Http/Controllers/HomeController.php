<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function packages()
    {
        $packages = Package::all();
        return view('packages', compact('packages'));
    }

    public function payment(){
        return view('payments');
    }

    public function checkout($id){
        $package= Package::where('package_id',$id)->first();
        return view ('checkout', compact('package'));
    }
}
