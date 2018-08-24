<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DataTables;
use Validator;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.masters.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>$validator->errors()]);
        }else{
            $user = new User;

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return response()->json(["success"=>true, "msg"=>"User was successfully saved!", "data"=>$request->all()]);
        }
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
        $user = User::find($id);
        return response()->json(["success"=>true, "msg"=>"", "data"=>$user]);
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
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>$validator->errors()]);
        }else{
            $user = User::find($id);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
            return response()->json(["success"=>true, "msg"=>"User was successfully updated!", "data"=>$request->all()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(["success"=>true, "msg"=>"User was successfully deleted!", "data"=>""]);
    }

    public function validateRequest($request){
        return Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required',
        ]);
    }

    public function getList(Request $request, $type="", $param_id=""){
        $users = DB::table('users')->select('id','username', 'name', 'email')->get();
        return DataTables::of($users)->make(true);
    }
}
