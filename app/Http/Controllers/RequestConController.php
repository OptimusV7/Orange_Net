<?php

namespace App\Http\Controllers;

use App\RequestCon;
use Illuminate\Http\Request;

class RequestConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        $data = RequestCon::orderBy('id','ASC')->paginate(10);
        return view('admin.connect.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
     * @param  \App\RequestCon  $requestCon
     *
     */
    public function show(RequestCon $requestCon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestCon  $requestCon
     *
     */
    public function edit(RequestCon $requestCon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestCon  $requestCon
     *
     */
    public function update(Request $request, RequestCon $requestCon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestCon  $requestCon
     *
     */
    public function destroy(RequestCon $requestCon)
    {
        //
    }
}
