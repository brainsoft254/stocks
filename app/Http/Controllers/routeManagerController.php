<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Stockspro;
use App\routeManager;

class routeManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes=routeManager::OrderBy('code','asc')->get();
        return view('settings.routes.index')->with(['routes'=>$routes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs=DB::table('users')->where('status',1)->get();
        return view('settings.routes.create')->with(['staffs'=>$staffs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code'=>'required',
            'description'=>'required',
            'rep'=> 'required|not_in:-1',
        ]);
        
        //dd($request);
        $route=new routeManager;
        $route->code=$request->code;
        $route->description=$request->description;
        $route->rep=$request->rep;
        $route->status=$request->status;
        $route->save();
        Stockspro::auditLog("Route-".$request->code." Added Successfully");
        return "Route Created Successfully";
  //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route=routeManager::findorFail($id);
        $staffs=DB::table('users')->where('status',1)->get();

        return view('settings.routes.edit')->with(['route'=>$route,'staffs'=>$staffs]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code'=>'required',
            'description'=>'required',
            'rep'=> 'required|not_in:-1',
        ]);
        
        //dd($request);
        $route=routeManager::findorFail($id);
        $route->code=$request->code;
        $route->description=$request->description;
        $route->rep=$request->rep;
        $route->status=$request->status;
        $route->save();

        Stockspro::auditLog("Route-".$request->code." Updated Successfully");

        return "Route Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route=routeManager::findorFail($id);
        Stockspro::auditLog('Route Deleted -'.$route->code);
        $route->delete();
        return "Route {".$route->code."} Deleted Successfully";
        //
    }
}
