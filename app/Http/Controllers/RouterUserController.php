<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Router;
use App\RouterUser;
use App\Sites;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use DB;
use mysql_xdevapi\Exception;

class RouterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        $data = RouterUser::orderBy('id','ASC')->paginate(10);
        return view('admin.router_user.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $user = Subscription::all();
        $location = Router::all();
        return view('admin.router_user.create', compact('location', 'user'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'router_ip' => 'required',
            'user_id' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'expire_date' => 'required|date_format:Y-m-d|after:today',
            'status' => 'required',
        ]);

        $input = $request->all();
        $userid = $request->user_id;

        $input['username']= $userid;

        $user = RouterUser::where('username', '=', $request->username)->orWhere('router_ip', '=', $request->router_ip);
        if ($user == null) {
            RouterUser::create($input);
            return redirect()->route('router.index')
                ->with('success','Router User created successfully');
        }
        else{
            return redirect()->route('router_user.create')
                ->with('success','Router User Already Created, Pick different user and router ip');
        }
    }


    public function show($id)
    {
        $routerUser = RouterUser::find($id);
        return view('admin.router_user.show',compact('routerUser'));
    }


    public function edit($id)
    {
        $routerUser = RouterUser::find($id);
        return view('admin.router_user.edit',compact('routerUser'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'router_ip' => 'required',
            'user_id' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'expire_date' => 'required|date_format:Y-m-d|after:today',
            'status' => 'required',
        ]);

        $input = $request->all();
        $userid = $request->user_id;

        $input['username']= $userid;

        $user = RouterUser::where('username', '=', $request->username)->orWhere('router_ip', '=', $request->router_ip);

        if ($user == null) {
            $routerUser = RouterUser::find($id);
            $routerUser->update($input);

            return redirect()->route('router.index')
                ->with('success','Router User updated successfully');
        }
        else{
            return redirect()->route('router_user.create')
                ->with('success','Router User Already Created, Pick different user and router ip');
        }


    }


    public function destroy($id)
    {
        RouterUser::find($id)->delete();
        return redirect()->route('router_user.index')
            ->with('success','Router deleted successfully');
    }
}
