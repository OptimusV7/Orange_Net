<?php

namespace App\Http\Controllers;

use App\Subscribers;
use App\Subscription;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{

    public function index(Request $request)
    {
        $data = Subscription::leftjoin('users', 'users.name', '=', 'subscriptions.user_id')
            ->leftjoin('router_users', 'router_users.username', '=', 'subscriptions.user_id')->orderBy('id','desc')
            ->paginate(10,['subscriptions.*', 'users.account_number',  'router_users.router_ip']);
//        $data = Subscription::join('router_users', 'router_users.username', '=', 'subscriptions.user_id')
//            ->paginate(10,['subscriptions.*',  'router_users.router_ip'])->;
//        dd($data);
        return view('admin.subscribers.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     *
     */
    public function show(Subscribers $subscribers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     *
     */
    public function edit(Subscribers $subscribers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribers  $subscribers
     *
     */
    public function update(Request $request, Subscribers $subscribers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribers  $subscribers
     *
     */
    public function destroy(Subscribers $subscribers)
    {
        //
    }
}
