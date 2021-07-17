<?php

namespace App\Http\Controllers;

use App\Bandwidth;
use App\Router;
use App\RouterUser;
use App\Sites;
use Illuminate\Http\Request;

class RouterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
//        $data = Router::leftjoin('router_users', 'router_users.router_ip', '=', 'routers.router_ip')
//        ->paginate(10,['routers.*',  'router_users.router_ip' ]);

        $data = Router::orderBy('id','ASC')->paginate(10);
        return view('admin.router.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $band = Bandwidth::all();
        $location = Sites::all();
        return view('admin.router.create', compact('band','location'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'router_ip' => 'required',
            'location' => 'required',
            'bandwidth' => 'required',
            'mac_address' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();

        Router::create($input);

        return redirect()->route('router.index')
            ->with('success','Router created successfully');
    }


    public function show($id)
    {
        $router = Router::find($id);
        return view('admin.router.show',compact('router'));
    }


    public function edit($id)
    {
        $band = Bandwidth::all();
        $location = Sites::all();
        $router = Router::find($id);
        return view('admin.router.edit',compact('router', 'band', 'location'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'router_ip' => 'required',
            'location' => 'required',
            'bandwidth' => 'required',
            'mac_address' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $router = Router::find($id);
        $router->update($input);

        return redirect()->route('router.index')
            ->with('success','Router updated successfully');
    }


    public function destroy($id)
    {
        Router::find($id)->delete();
        return redirect()->route('router.index')
            ->with('success','Router deleted successfully');
    }
}
