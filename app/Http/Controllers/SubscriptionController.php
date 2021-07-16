<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function getSubscription(Request $request){
        $data = Subscription::orderBy('id','ASC')->paginate(10);
        return view('subscription',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        $data = Subscription::orderBy('id','ASC')->paginate(10);
        return view('admin.payment.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


}
