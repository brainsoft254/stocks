<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Reams;
use App\location;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::OrderBy('id','asc')->get();
        return view('auth.users.index')->with(['users'=>$users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=role::all();
        $locations=location::OrderBy('id','desc')->get();
        return view('auth.users.create')->with(['roles'=>$roles,'locations'=>$locations]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'ugroup' => 'required|not_in:-1',
            'location' => 'required|not_in:-1',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $toemail=$request->email;
        $user=new user;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->ugroup=$request->ugroup;
        $user->status=$request->status;
        $user->station=$request->location;
        $user->password=Hash::make($request->password);
        $user->save();

        $username=array("user"=>$request->email);

        Mail::send('email.welcome', $username, function($message)use ($username,$toemail)
        {
            $message
            ->from('info@brainsoft.co.ke', 'Brainsoft Ke')
            ->to($toemail)
            ->subject("Welcome to ReamsPro");
        });

        return "User Created Successfully";
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
        $user=User::findorFail($id);
        $roles=role::all();
        $locations=location::OrderBy('id','desc')->get();
        return view('auth.users.edit')->with(['user'=>$user,'roles'=>$roles,'locations'=>$locations]);
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


        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|not_in:-1',
            'ugroup' => 'required|not_in:-1',
        ]);
        

        $user=user::findorFail($id);
        $user->name=$request->name;
        $user->ugroup=$request->ugroup;
        $user->status=$request->status;
        $user->station=$request->location;
        $user->save();


        return "User Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        User::destroy($id);
        $log=Stockspro::auditLog("User : { ".$coy->email." } Deleted Successfully");
        return "User Details Deleted Successfully";
    }


    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}