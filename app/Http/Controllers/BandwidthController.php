<?php

namespace App\Http\Controllers;

use App\Bandwidth;
use Illuminate\Http\Request;

class BandwidthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        $data = Bandwidth::orderBy('id','ASC')->paginate(10);
        return view('admin.bandwidth.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.bandwidth.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'speed' => 'required',
            'date_from' => 'required|date_format:Y-m-d',
            'date_to' => 'required|date_format:Y-m-d|after:today',
        ]);

        $input = $request->all();
        $input['speeds'] = $request->speed . "Mbs";
        Bandwidth::create($input);

        return redirect()->route('bandwidth.index')
            ->with('success','bandwidth created successfully');
    }


    public function show($id)
    {
        $bandwidth = Bandwidth::find($id);
        return view('admin.bandwidth.show',compact('bandwidth'));
    }


    public function edit($id)
    {
        $bandwidth = Bandwidth::find($id);

        return view('admin.bandwidth.edit',compact('bandwidth'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'speeds' => 'required',
            'date_from' => 'required|date_format:Y-m-d',
            'date_to' => 'required|date_format:Y-m-d|after:today',
        ]);

        $input = $request->all();


        $bandwidth = Bandwidth::find($id);
        $bandwidth->update($input);

        return redirect()->route('bandwidth.index')
            ->with('success','Bandwidth updated successfully');
    }


    public function destroy($id)
    {
        Bandwidth::find($id)->delete();
        return redirect()->route('bandwidth.index')
            ->with('success','Bandwidth deleted successfully');
    }
}
