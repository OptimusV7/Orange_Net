<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function getSubscription(Request $request){
        $user = auth()->user()->name;
        $data = Subscription::where('user_id',$user )->orderBy('id','ASC')->paginate(10);
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
        $data = Subscription::join('users', 'users.name', '=', 'subscriptions.user_id')
            ->paginate(10,['subscriptions.*', 'users.account_number']);
//        $data = Subscription::orderBy('id','ASC')->paginate(10);
        return view('admin.payment.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


}
