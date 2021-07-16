<?php

namespace App\Http\Controllers;

use App\Bandwidth;
use App\Package;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        $data = Package::orderBy('id','ASC')->paginate(10);
        return view('admin.packages.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $band = Bandwidth::all();
        return view('admin.packages.create', compact('band'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'code' => 'required',
            'status' => 'required',
            'bandwidth' => 'required',
        ]);

        $input = $request->all();
        if ($request->status == "Active") {
            $input['status'] = 1;
        }
        else{
            $input['status'] = 0;
        }

        Package::create($input);
        return redirect()->route('package.index')
            ->with('success','Package created successfully');
    }


    public function show($id)
    {
        $package = Package::find($id);
        return view('admin.packages.show',compact('package'));
    }


    public function edit($id)
    {
        $package = Package::find($id);
        $band = Bandwidth::all();
        return view('admin.packages.edit',compact('package', 'band'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'code' => 'required',
            'status' => 'required',
            'bandwidth' => 'required',
        ]);

        $input = $request->all();
        if ($request['status'] == "Active") {
            $input['status'] = 1;
        }
        else{
            $input['status'] = 0;
        }
        $package = Package::find($id);

        $package->update($input);

        return redirect()->route('package.index')
            ->with('success','Package updated successfully');
    }


    public function destroy($id)
    {
        Package::find($id)->delete();
        return redirect()->route('package.index')
            ->with('success','Package deleted successfully');
    }
}
