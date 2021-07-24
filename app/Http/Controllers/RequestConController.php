<?php

namespace App\Http\Controllers;

use App\RequestCon;
use App\Router;
use App\RouterUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RequestConController extends Controller
{

    public function index(Request $request)
    {
        $data = RequestCon::orderBy('id','ASC')->paginate(10);
        return view('admin.connect.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($requestCon)
    {
        //
    }


    public function edit($requestCon)
    {

        $con = RequestCon::find($requestCon);
        $ips =  Router::all();
        return view('admin.connect.edit', compact('con', 'ips'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'router_ip' => 'required',
            'username' => 'required',
        ]);



        $user = User::where('email', $request->username)->first();

        if ($user == null){
            return redirect()->route('request_con.index')
                ->with('success','User does not Exit');
        }

        $input['status'] = "Connected";
        $site = RequestCon::find($id);
        $site->update($input);

        $input['router_ip'] = $request->router_ip;
        $input['user_id'] = $user->name;
        $input['username'] = $user->name;
        $input['status'] = "Active";
        $mytime = Carbon::now();
        $today = $mytime->toDateTimeString();
        $input['start_date'] = $today;
        $timeTo = Carbon::now()->addDays(30);
        $input['expire_date'] =$timeTo  ;

        $user = RouterUser::where('username', '=', $request->username)->orWhere('router_ip', '=', $request->router_ip);
        if ($user == null) {
            RouterUser::create($input);
            return redirect()->route('request_con.index')
                ->with('success','User Connected successfully');
        }
        else{
            return redirect()->route('request_con.edit',$id )
                ->with('success','Router already in use, Pick different router ip');
        }

    }


    public function destroy($requestCon)
    {
        //
    }
}
