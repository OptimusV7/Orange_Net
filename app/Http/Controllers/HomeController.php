<?php

namespace App\Http\Controllers;

use App\Package;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = auth()->user()->name;
        $data=Subscription::select('*')
            ->where([
                ['user_id', '=', $user]

            ])->latest()->first();

        //dd($data->package_name);

        if ($data == "")
        {
            return view('home',compact('data'));
        }
        else{
            $packageData = Package::where('name', $data->package_name)->first();
            return view('home',compact('data', 'packageData'));
        }

    }

    public function packages()
    {
        $user = auth()->user()->name;
        $data = Subscription::where('user_id',$user )->first();
        if ($data != ""){
            $packages = Package::all()->where('status', true);
            return view('packages', compact('packages', 'data'));

        }else{
            $packages = Package::all()->where('status', true);
            return view('packages', compact('packages'));
        }


    }

    public function payment(Request $request){
        $user = auth()->user()->name;
        $data = Subscription::where('user_id',$user )->orderBy('id','ASC')->paginate(10);
        return view('payments',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    public function checkout($id){
        $package= Package::where('id',$id)->first();
        return view ('checkout', compact('package'));
    }
}
