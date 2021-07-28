<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use PragmaRX\Tracker\Vendor\Laravel\Facade as Tracker;

class AdminController extends Controller
{
    public function index()
    {
        $count = User::count();
        $sum = Subscription::sum('amount');
        $users = Tracker::currentSession()->count();
        $usersOnline = Tracker::onlineUsers()->count();
        $sessions = Tracker::sessions(60 * 24);
        return view('admin.home.index', compact('count','sum', 'users', 'usersOnline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
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
     * @param  \App\Admin  $admin
     *
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     *
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     *
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     *
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
