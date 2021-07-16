<?php

namespace App\Http\Controllers;

use App\Sites;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        $data = Sites::orderBy('id','ASC')->paginate(10);
        return view('admin.sites.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.sites.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'building_name' => 'required',
            'location' => 'required',
            'units' => 'required',
        ]);

        $input = $request->all();

        Sites::create($input);

        return redirect()->route('sites.index')
            ->with('success','Site created successfully');
    }


    public function show($id)
    {
        $site = Sites::find($id);
        return view('admin.sites.show',compact('site'));
    }


    public function edit($id)
    {
        $site = Sites::find($id);

        return view('admin.sites.edit',compact('site'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'building_name' => 'required',
            'location' => 'required',
            'units' => 'required',
        ]);

        $input = $request->all();

        $site = Sites::find($id);
        $site->update($input);

        return redirect()->route('sites.index')
            ->with('success','Site updated successfully');
    }


    public function destroy($id)
    {
        Sites::find($id)->delete();
        return redirect()->route('sites.index')
            ->with('success','Site deleted successfully');
    }
}
